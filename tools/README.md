# tools/ — outils de build (hors runtime)

Rien ici n'est nécessaire pour faire tourner l'application. À déployer : uniquement
ce dont Laravel a besoin (le reste du dossier `site/`).

## Contenu

| Élément | Rôle |
|---|---|
| `scraper.py` | Scrape el sitio de origen ($SOURCE_SITE) → JSON + images. Voir « Ré-scraper » ci-dessous. |
| `requirements.txt` | Dépendances Python des deux scripts. |

## Données de seed

Pas de doublon d'images. Une seule copie, celle qui est servie :

| Quoi | Où | Taille |
|---|---|---|
| JSON (catégories, produits, avis…) | `database/data/*.json` | ~5 Mo |
| Images produits | `public/assets/images/<cat>/<slug>/NN.png` | ~99 Mo |

Le seeder lit les JSON dans `database/data/`, puis pour chaque image il **vérifie
sa présence dans `public/assets/`** et enregistre le chemin en base. Aucune copie,
aucun second dossier `images/`.

Réimport complet :

```bash
php artisan migrate:fresh --seed   # ou : php artisan db:seed --class=VerdaniaSeeder
```

Si le seeder signale des images manquantes → il faut (re)télécharger les assets.

## Ré-scraper

Le scraper écrit `local_path = images/<cat>/<slug>/NN.ext`, relatif à `--out`.
Pour alimenter directement le dossier servi :

```bash
cd site
python tools/scraper.py --out public/assets            # images -> public/assets/images/...
python tools/scraper.py --out /tmp/scrape --no-images   # JSON seuls
cp /tmp/scrape/*.json database/data/                    # puis on copie les JSON
```
