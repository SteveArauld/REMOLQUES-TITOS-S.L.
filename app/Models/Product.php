<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Product extends Model
{
    protected $guarded = [];

    protected $casts = [
        'on_sale'         => 'boolean',
        'is_in_stock'     => 'boolean',
        'is_purchasable'  => 'boolean',
        'price'           => 'decimal:2',
        'regular_price'   => 'decimal:2',
        'sale_price'      => 'decimal:2',
        'average_rating'  => 'decimal:2',
        'dimensions'      => 'array',
        'brands'          => 'array',
        'tags'            => 'array',
        'attributes'      => 'array',
    ];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(ProductImage::class)->orderBy('position');
    }

    public function primaryImage(): HasOne
    {
        return $this->hasOne(ProductImage::class)->orderBy('position');
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class)->approved()->latest('reviewed_at');
    }

    /** URL publique de l'image principale (ou placeholder). */
    public function getThumbUrlAttribute(): string
    {
        $img = $this->relationLoaded('primaryImage') ? $this->primaryImage : $this->primaryImage()->first();

        return $img?->url ?? asset('assets/img/placeholder.svg');
    }

    /** URL publique de la 2e image, affichée au survol (retombe sur l'image principale). */
    public function getHoverThumbUrlAttribute(): string
    {
        $images = $this->relationLoaded('images') ? $this->images : $this->images()->get();

        return $images->get(1)?->url ?? $this->thumb_url;
    }

    public function getHasDiscountAttribute(): bool
    {
        return $this->on_sale
            && $this->regular_price !== null
            && (float) $this->regular_price > (float) $this->price;
    }

    /**
     * Résout un produit à partir d'une référence pouvant être :
     * l'id Laravel, l'id WordPress d'origine (source_id) ou le slug.
     * Nécessaire car les pages « miroir » (@verbatim) utilisent les id WordPress.
     */
    public static function findByRef(int|string|null $ref): ?self
    {
        $ref = is_string($ref) ? trim($ref) : $ref;
        if ($ref === null || $ref === '') {
            return null;
        }

        $num = is_numeric($ref) ? (int) $ref : null;

        return static::query()
            ->when($num !== null, fn ($q) => $q->where('id', $num)->orWhere('source_id', $num))
            ->when($num === null, fn ($q) => $q->where('slug', (string) $ref))
            ->first();
    }

    /* ===================== Google Merchant Center ===================== */

    /** Marques fabricant reconnues dans le nom/description. */
    private const KNOWN_BRANDS = [
        'John Deere', 'Stihl', 'Honda', 'Gardena', 'Bosch', 'Makita', 'Einhell',
        'Husqvarna', 'Kawasaki', 'Anova', 'Greencut', 'Worx', 'Ryobi', 'Stiga', 'Viking',
        'Briggs & Stratton', 'Loncin', 'Kubota', 'McCulloch', 'Alpina', 'Grillo', 'BCS', 'Ducati',
    ];

    /** Marque : marque déclarée > marque fabricant détectée > tag pertinent > enseigne. */
    public function getMerchantBrandAttribute(): string
    {
        $brands = is_array($this->brands) ? $this->brands : [];
        foreach ($brands as $b) {
            $name = is_array($b) ? ($b['name'] ?? null) : $b;
            if (filled($name)) {
                return (string) $name;
            }
        }

        $haystack = $this->name.' '.$this->slug.' '.strip_tags((string) $this->short_description);
        foreach (self::KNOWN_BRANDS as $brand) {
            if (stripos($haystack, $brand) !== false || stripos($haystack, str_replace(' ', '', $brand)) !== false) {
                return $brand;
            }
        }

        // Aucune marque fabricant identifiable -> marque de l'enseigne (private label).
        return 'Remolquestitos';
    }

    /** true si un GTIN/MPN fiable existe (ici : uniquement si SKU renseigné). */
    public function getHasMerchantIdentifierAttribute(): bool
    {
        return filled($this->sku);
    }

    /** Description propre, sans HTML, limitée à 5000 caractères (règle GMC). */
    public function getMerchantDescriptionAttribute(): string
    {
        $raw = $this->short_description ?: strip_tags((string) ($this->description_html ?: $this->description));
        $raw = trim(preg_replace('/\s+/u', ' ', (string) $raw));

        return $raw !== '' ? mb_substr($raw, 0, 4999) : $this->name;
    }

    /**
     * Catégorie Google Shopping (ID numérique de la taxonomie officielle).
     * https://support.google.com/merchants/answer/6324436
     */
    public function getGoogleProductCategoryAttribute(): int
    {
        $cats = $this->relationLoaded('categories')
            ? $this->categories->pluck('slug')->all()
            : $this->categories()->pluck('slug')->all();
        $slugs = implode(' ', $cats).' '.$this->slug.' '.$this->name;

        return match (true) {
            (bool) preg_match('/robot/i', $slugs)                 => 4632,   // Robotic Lawn Mowers
            (bool) preg_match('/cortacesped|cortac|segadora/i', $slugs) => 3798, // Lawn Mowers
            (bool) preg_match('/desbrozad|cortabord/i', $slugs)   => 3311,   // String Trimmers
            (bool) preg_match('/soplador/i', $slugs)              => 3798,   // (Outdoor Power Equipment)
            (bool) preg_match('/tritur|biotritur/i', $slugs)      => 6828,   // Chippers & Shredders
            (bool) preg_match('/motoazad|fresadora/i', $slugs)    => 3311,   // Cultivators
            (bool) preg_match('/remolque/i', $slugs)              => 1330,   // Trailers
            (bool) preg_match('/tractor|minitrac/i', $slugs)      => 3798,   // Lawn Mowers (ride-on)
            default                                               => 500051, // Outdoor Power Equipment
        };
    }
}
