<p align="center">
  <img src="public/assets/img/logo.png" alt="Remolques Titos" width="360">
</p>

<h1 align="center">Remolques Titos — Tienda online</h1>

<p align="center">
  Aplicación de comercio electrónico en <strong>Laravel 12</strong> que reproduce
  fielmente la tienda del tema WordPress <em>Zota</em> (WooCommerce + Elementor)
  con datos dinámicos, carrito, checkout, emails y panel de administración.
</p>

---

## 1. La empresa

| Dato | Valor |
|---|---|
| Razón social | **REMOLQUES TITOS S.L.** |
| CIF / NIF | B18392092 |
| Forma jurídica | Sociedad Limitada |
| Constitución | 22 de junio de 1995 |
| Registro | Registro Mercantil de Granada · estado: activa · última modificación 21/12/2025 |
| Domicilio | Avenida Los Emigrantes, s/n · 18560 Guadahortuna (Granada) · Andalucía · España |
| Objeto social | Fabricación de remolques y de maquinaria agrícola; reparación de maquinaria agrícola, remolques y vehículos. CNAE 4520; actividad principal: fabricación de remolques agrícolas. |
| Web / email | www.remolquestitos.es · contacto@remolquestitos.es |

Estos datos figuran en el pie de página, en la página de **Contacto** y, de forma
completa, en el **Aviso Legal** y la **Política de Privacidad**.

## 2. Puesta en marcha

Requisitos: **PHP 8.3+**, **Composer**, extensión `pdo_sqlite`, `imagemagick` (solo para regenerar iconos).

```bash
cd site
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate:fresh --seed      # crea las tablas e importa el catálogo
php artisan serve                     # http://localhost:8000
```

- Front-office: <http://localhost:8000>
- Panel de administración: <http://localhost:8000/admin> — autenticación básica
  (`ADMIN_USER` / `ADMIN_PASSWORD` en `.env`, por defecto `admin` / `remolquestitos`).

> El servidor de desarrollo de PHP es monoproceso. Para servir la home (≈ 400
> subrecursos del tema) sin cortes, arráncalo con varios *workers*:
> `PHP_CLI_SERVER_WORKERS=8 php artisan serve`.

## 3. Datos (seeder `RemolquesTitosSeeder`)

| Contenido | Cantidad |
|---|---|
| Categorías | 8 |
| Productos | 93 |
| Imágenes de producto | 319 (`public/assets/images/<categoría>/<slug>/NN.jpg`) |
| Reseñas de clientes | 3 261 |
| Relaciones producto ↔ categoría | 95 |

Los pedidos se guardan en `orders` / `order_items`, los mensajes del formulario en
`contact_messages` y los usuarios registrados en `users`.

## 4. Funcionalidades

| Zona | Ruta(s) | Estado |
|---|---|---|
| Inicio | `/` | Réplica exacta del tema (hero RevSlider, secciones Elementor, carruseles) |
| Tienda / categoría | `/tienda`, `/categoria-de-producto/{slug}` | Filtro, búsqueda, orden, paginación, vista rejilla/lista |
| Ficha de producto | `/producto/{slug}` | Galería, pestañas, **reseñas + formulario**, relacionados, vista rápida |
| Buscador con autocompletado | `/wp-admin/admin-ajax.php?action=zota_autocomplete_search` | Devuelve JSON compatible con el tema |
| Carrito | `/carrito` (+ mini-cart AJAX) | Sesión; añadir por POST (AJAX) o enlace GET de respaldo |
| Checkout | `/checkout` → `/pedido/{n}/gracias` | Crea el pedido y **envía 2 emails** (cliente + administrador) |
| Seguimiento de pedidos | `/seguimiento-de-pedidos` | Búsqueda por nº de pedido + email |
| Mi cuenta | `/mi-cuenta` | **Login / registro / logout** reales + historial de pedidos |
| Favoritos | `/favoritos` | Lista de deseos en `localStorage` |
| Contacto | `/contacto` | Guarda en BD + email al administrador |
| Páginas legales | `/pagina/{aviso-legal…}` | Aviso Legal, Privacidad, Términos, Envío, Devoluciones |
| Panel admin | `/admin`, `/admin/pedidos/{n}`, `/admin/mensajes` | Pedidos, cambio de estado, mensajes |
| **Feed Google Merchant Center** | ver §6 | RSS 2.0 + `g:` — 93 items, 0 campos ausentes |

Emails: por defecto `MAIL_MAILER=log` (se escriben en `storage/logs/laravel.log`).
Para envío real, configurar SMTP en `.env`.

## 5. Estilo idéntico al original

Los assets del tema (Zota, WooCommerce, Elementor, RevSlider, jQuery…) se sirven
**tal cual** desde `public/wp-content/` y `public/wp-includes/`. El sitio es
**100 % autónomo**: sin Google Tag Manager, Smartsupp ni llamadas a dominios
externos; las fuentes de Google se sirven en local.

- `resources/views/layouts/wp.blade.php` — `<head>` + cabecera + pie + scripts exactos.
- `resources/views/wp/*.blade.php` — contenido interno exacto de cada página estática.
- `resources/views/{shop,product,cart,checkout,…}.blade.php` — vistas dinámicas con
  el marcado WooCommerce del tema.
- `public/assets/css/lv.css` — complemento con alcance `.lv-scope` (no interfiere con el tema).
- `public/assets/js/{shop-bridge,nav-active}.js` — puente AJAX del carrito y resaltado
  del menú activo.

### Logotipo e iconos

| Archivo | Uso |
|---|---|
| `public/assets/img/logo.png` | Logo a color — pie de página, cabecera clara (admin) |
| `public/assets/img/logo-blanc.png` | Logo blanco — cabecera y menú (fondo verde oscuro) |
| `public/favicon.ico`, `assets/img/favicon-*.png` | Favicon (logo blanco sobre cuadro verde `#044200`) |
| `assets/img/apple-touch-icon.png`, `icon-192/512.png`, `site.webmanifest` | iOS / Android / PWA |

Para regenerar los iconos a partir de `logo-blanc.png`: ver el bloque `magick` del historial del proyecto.

## 6. Feed Google Merchant Center

| Uso | URL |
|---|---|
| Ver en el navegador | `GET /feed/google-merchant.xml` |
| Descargar el archivo | `GET /feed/google-merchant.xml/descargar` |

`?nocache=1` fuerza la regeneración (caché de 1 h). Cada `<item>` incluye `id`,
`title`, `description`, `link`, `image_link` (+ `additional_image_link`),
`availability`, `condition`, `price`/`sale_price`, `brand`, `identifier_exists`,
`google_product_category`, `product_type`, `shipping` y `shipping_weight`.

> En producción, `APP_URL` debe ser el dominio HTTPS real; de lo contrario los
> `link`/`image_link` salen como `http://localhost` y Google los rechaza.

## 7. Verificación de enlaces

```bash
php linkcheck.py          # recorre todo el sitio y falla si hay algún enlace roto
```

Último resultado: **167 páginas / 497 recursos — 0 errores**.

## 8. Estructura

```
site/
├── app/Http/Controllers/     Home, Shop, Product, Cart, Checkout, Order,
│                             Account, Wishlist, Contact, Page, Ajax, Feed, Admin/*
├── app/Models/               Category, Product, ProductImage, Review, Order, OrderItem, …
├── app/Services/CartService.php
├── resources/views/          layouts/, wp/, partials/, emails/, admin/, + vistas dinámicas
├── database/seeders/RemolquesTitosSeeder.php
├── public/wp-content, wp-includes   assets del tema
├── public/assets/            css/, js/, img/, images/ (fotos de producto)
├── linkcheck.py              verificador de enlaces
└── PROJECT.md                notas técnicas detalladas
```

## 9. Producción

`APP_DEBUG=false`, `APP_ENV=production`, `APP_URL=https://…`; `php artisan
config:cache route:cache view:cache`; servir con nginx + php-fpm apuntando a
`public/`; configurar SMTP; **cambiar `ADMIN_PASSWORD`**.
