# Remolquestitos — tienda Laravel (tema Zota`admin` / `remolquestitos`WooCommerce / Elementor)

Reproduce el sitio estático de un volcado HTML del tema (tema WordPress **Zota** +
WooCommerce + Elementor) con datos dinámicos, carrito, checkout y emails.

## Puesta en marcha

```bash
cd site
composer install
php artisan key:generate           # si APP_KEY vacío
(vistas Blade mantenidas directamente en resources/views/)
php artisan migrate:fresh --seed    # tablas + productos/categorías/imágenes/opiniones
php artisan serve                   # http://localhost:8000
```

- **Admin:** `/admin` — Basic Auth (`ADMIN_USER``admin` / `remolquestitos``ADMIN_PASSWORD` en `.env`, por defecto `admin` / `remolquestitos`).

## Estilo — idéntico al sitio original

Los assets del tema se copiaron **tal cual** a `public/`:

```
public/wp-content/…   (tema Zota, WooCommerce, Elementor, RevSlider, plugins) — 15 MB
public/wp-includes/…  (jQuery, wp-polyfill, etc.)
```

`build_views.py`:
1. Toma el `<head>` + cabecera + pie + scripts **exactos** de el `index.html` del tema
   → `resources/views/layouts/wp.blade.php` (todas las URLs reescritas a `/wp-content/…`).
2. Extrae el contenido interno **exacto** de cada página estática
   → `resources/views/wp/*.blade.php`.
3. `strip_external()` — deja el sitio **100 % autónomo**: elimina Google Tag Manager,
   Smartsupp, los emojis de WordPress (s.w.org), Google Site Kit, `dns-prefetch` y
   todo enlace a dominios externos. Las fuentes Google se sirven en local
   (`public/wp-content/fonts/fonts.css` + 15 `.woff2`).

### Assets reparados (el ripper HTTrack los dejó vacíos o mal nombrados)

- `revslider/.../rs6.min.js` (0 B → 410 KB) — el hero no arrancaba.
- `wp-includes/js/dist/hooks.min.js` (0 B) — dependencia de WooCommerce en todas las páginas.
- `elementor/assets/js/*.bundle.min.js` — **22 chunks** que faltaban (`ChunkLoadError`).
- `elementor/css/post-384.css` — el ripper lo guardó como `.html`; se corrige la referencia.
- `zota/js/jquery.countdowntimer.min.js`, `jquery.fastclick.min.js` (0 B).
- 8 imágenes de producto (`2024/03/*.png`) que faltaban.

Verificado: **0 assets rotos ni vacíos** en las 14 rutas.

## Páginas

| Ruta | Vista | Tipo |
|---|---|---|
| `/` | `wp/home` | **Idéntica** a index.html (hero, sliders, secciones Elementor) |
| `/pagina/{aviso-legal…}` | `wp/*` | **Idénticas** a las páginas legales estáticas |
| `/contacto` | `wp/contacto` | **Idéntica**; el formulario (WPForms) envía a Laravel → guarda + email |
| `/seguimiento-de-pedidos` | `wp/seguimiento-de-pedidos` | **Idéntica**; busca el pedido por nº + email |
| `/mi-cuenta` | `wp/mi-cuenta` | **Idéntica**; `?email=` muestra el historial de pedidos |
| `/favoritos` | `wishlist` | Lista desde `localStorage` (botón ♥ en todas las tarjetas) |
| `/tienda`, `/categoria-de-producto/{slug}` | `shop` | Dinámica, misma cabecera/pie/CSS del tema, tarjetas con marcado WooCommerce |
| `/producto/{slug}` | `product` | Dinámica (galería, pestañas, **opiniones + formulario**), marcado `single-product` del tema |
| `/carrito`, `/checkout`, `/pedido/{n}/gracias` | `cart``admin` / `remolquestitos``checkout` / `thank-you` | Dinámicas, estilo del tema + `public/assets/css/lv.css` |
| `/admin`, `/admin/pedidos/{n}`, `/admin/mensajes` | `admin/*` | Panel interno |

`public/assets/js/shop-bridge.js` conecta los botones «Añadir al carrito» del tema
(incl. los de la home estática) con el backend Laravel vía fetch, y actualiza el contador.

## Datos (seeder `VerdaniaSeeder`)

8 categorías · 93 productos · 95 relaciones · 319 imágenes (`public/assets/images/<cat>/<slug>/NN.jpg`)
· **3261 opiniones** de clientes scrapeadas (`reviews`).
Pedidos → `orders` + `order_items`; contacto → `contact_messages`.

## Emails

`MAIL_MAILER=log` → se escriben en `storage/logs/laravel.log` (confirmación al cliente
+ aviso al admin en cada pedido, y aviso en cada contacto). Para envío real, configurar
SMTP en `.env` (`MAIL_MAILER=smtp`, host, usuario, contraseña, `MAIL_ADMIN_ADDRESS`).

## Limitaciones conocidas

- **Login`admin` / `remolquestitos`registro de `/mi-cuenta`**: se muestra el formulario del tema pero la
  autenticación WooCommerce no está implementada (se usa consulta por email).
- La **wishlist YITH** original es visual; los favoritos funcionan vía `localStorage`.
- 1 producto con slug que contiene `²` (`robot-cortacesped-…-m²`) puede requerir
  ajuste de slug para el enlace directo.
