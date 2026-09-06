<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Review;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class RemolquesTitosSeeder extends Seeder
{
    /** Dossier des données de seed : database/data (JSON produits par tools/scraper.py). */
    private string $dataDir;

    /** Chemins d'images référencées mais absentes de public/assets. */
    private array $missingImages = [];

    public function run(): void
    {
        $this->dataDir = database_path('data');

        if (! File::isDirectory($this->dataDir)) {
            $this->command->error("Dossier de données introuvable : {$this->dataDir}");
            return;
        }

        $categories = json_decode(File::get("{$this->dataDir}/categories.json"), true);
        $products   = json_decode(File::get("{$this->dataDir}/products.json"), true);
        $reviews    = File::exists("{$this->dataDir}/reviews.json")
            ? json_decode(File::get("{$this->dataDir}/reviews.json"), true)
            : [];

        DB::transaction(function () use ($categories, $products, $reviews) {
            $this->seedCategories($categories);
            $this->seedProducts($products);
            $this->seedReviews($reviews);
            $this->refreshRatingAggregates();
        });

        $this->command->info('Import terminé : '
            .Category::count().' catégories, '
            .Product::count().' produits, '
            .ProductImage::count().' images, '
            .Review::count().' avis.');

        if ($this->missingImages !== []) {
            $this->command->warn(count($this->missingImages).' image(s) référencée(s) absente(s) de public/assets — '
                .'lancer le scraper avec « --out public/assets » pour les récupérer.');
        }
    }

    private function seedCategories(array $categories): void
    {
        foreach ($categories as $cat) {
            Category::updateOrCreate(
                ['source_id' => $cat['id']],
                [
                    'name'             => $cat['name'],
                    'slug'             => $cat['slug'],
                    'parent_source_id' => $cat['parent_id'] ?: null,
                    'description'      => $cat['description'] ?: null,
                    'image'            => $cat['image'] ?? null,
                    'permalink'        => $cat['permalink'] ?? null,
                    'product_count'    => $cat['product_count'] ?? 0,
                ]
            );
        }
    }

    private function seedProducts(array $products): void
    {
        $catBySource = Category::pluck('id', 'source_id');

        foreach ($products as $p) {
            $product = Product::updateOrCreate(
                ['source_id' => $p['id']],
                [
                    'name'                  => $p['name'],
                    'slug'                  => str_ireplace('%c2%b2', '2', $p['slug']),
                    'sku'                   => $p['sku'] ?: null,
                    'type'                  => $p['type'] ?? null,
                    'short_description'      => $p['short_description'] ?: null,
                    'short_description_html' => $p['short_description_html'] ?: null,
                    'description'            => $p['description'] ?: null,
                    'description_html'       => $p['description_html'] ?: null,
                    'on_sale'                => (bool) ($p['on_sale'] ?? false),
                    'price'                  => $p['price'],
                    'regular_price'          => $p['regular_price'],
                    'sale_price'             => $p['sale_price'],
                    'currency'               => $p['currency'] ?? null,
                    'average_rating'         => is_numeric($p['average_rating'] ?? null) ? $p['average_rating'] : null,
                    'review_count'           => $p['review_count'] ?? 0,
                    'is_in_stock'            => (bool) ($p['is_in_stock'] ?? true),
                    'is_purchasable'         => (bool) ($p['is_purchasable'] ?? true),
                    'stock_availability'     => $p['stock_availability'] ?? null,
                    'low_stock_remaining'    => $p['low_stock_remaining'] ?? null,
                    'weight'                 => $p['weight'] ?: null,
                    'dimensions'             => $p['dimensions'] ?: null,
                    'brands'                 => $p['brands'] ?? [],
                    'tags'                   => $p['tags'] ?? [],
                    'attributes'             => $p['attributes'] ?? [],
                    'permalink'              => $p['permalink'] ?? null,
                ]
            );

            // Catégories (pivot)
            $ids = collect($p['category_ids'] ?? [])
                ->map(fn ($sid) => $catBySource[$sid] ?? null)
                ->filter()
                ->values()
                ->all();
            $product->categories()->sync($ids);

            // Images : référence le fichier déjà présent dans public/assets/... (aucune copie)
            $product->images()->delete();
            $catSlug = optional(Category::whereKey($ids[0] ?? 0)->first())->slug ?? 'sans-categorie';
            foreach ($p['images'] ?? [] as $img) {
                $local = $img['local_path'] ?? null;
                if (! $local) {
                    // Reconstruit le chemin attendu si le scraper ne l'a pas renseigné.
                    $ext = pathinfo(parse_url($img['src'] ?? '', PHP_URL_PATH) ?: '', PATHINFO_EXTENSION) ?: 'jpg';
                    $local = sprintf('images/%s/%s/%02d.%s', $catSlug, $p['slug'], $img['position'] ?? 1, strtolower($ext));
                }
                // Le scraper encode « ² » en %c2%b2 dans les noms de dossier ; on aligne
                // sur le slug nettoyé (str_ireplace ci-dessus) pour éviter les 404.
                $local = str_ireplace('%c2%b2', '2', $local);
                $publicPath = $this->resolveImage($local);

                $product->images()->create([
                    'position' => $img['position'] ?? 1,
                    'wp_id'    => $img['wp_id'] ?? null,
                    'src'      => $img['src'] ?? null,
                    'path'     => $publicPath,   // ex: assets/images/accesorio/xxx/01.jpg
                    'name'     => $img['name'] ?? null,
                    'alt'      => $img['alt'] ?? null,
                ]);
            }
        }
    }

    private function seedReviews(array $reviews): void
    {
        if (! $reviews) {
            return;
        }

        $productBySource = Product::pluck('id', 'source_id');
        Review::query()->delete();

        $rows = [];
        foreach ($reviews as $r) {
            $productId = $productBySource[$r['product_id']] ?? null;
            if (! $productId) {
                continue;
            }

            $rows[] = [
                'source_id'   => $r['id'] ?? null,
                'product_id'  => $productId,
                'reviewer'    => $r['reviewer'] ?: 'Cliente',
                'review'      => $r['review'] ?? null,
                'review_html' => $r['review_html'] ?? null,
                'rating'      => (int) ($r['rating'] ?? 5),
                'verified'    => (bool) ($r['verified'] ?? false),
                'approved'    => true,
                'reviewed_at' => $r['date_created'] ?? now(),
                'created_at'  => now(),
                'updated_at'  => now(),
            ];
        }

        foreach (array_chunk($rows, 500) as $chunk) {
            Review::insert($chunk);
        }
    }

    private function refreshRatingAggregates(): void
    {
        $stats = Review::query()
            ->selectRaw('product_id, COUNT(*) as c, AVG(rating) as a')
            ->groupBy('product_id')
            ->get()
            ->keyBy('product_id');

        // Recalcule à partir des avis RÉELLEMENT importés : un produit sans avis
        // en base voit son compteur/scoring remis à zéro (le count scrapé peut être faux).
        foreach (Product::query()->pluck('id') as $productId) {
            $s = $stats->get($productId);
            Product::whereKey($productId)->update([
                'review_count'   => $s?->c ?? 0,
                'average_rating' => $s ? round((float) $s->a, 2) : null,
            ]);
        }
    }

    /**
     * Les images sont servies (et stockées) une seule fois : public/assets/images/...
     * On ne fait que vérifier leur présence et renvoyer le chemin relatif à public/.
     *
     * $localPath vient du scraper, ex. "images/accesorio/mon-slug/01.jpg".
     * Le scraper doit écrire directement dans public/assets (voir tools/README.md).
     */
    private function resolveImage(?string $localPath): ?string
    {
        if (! $localPath) {
            return null;
        }

        $relative = 'assets/'.ltrim($localPath, '/');           // assets/images/...

        if (! File::exists(public_path($relative))) {
            $this->missingImages[] = $relative;

            return null;
        }

        return $relative;
    }
}
