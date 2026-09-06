# Puesta en producción — Tractoristeria (Remolquestitos)

## Auditoría de enlaces (hecha)

Rastreo completo del sitio con seguimiento de todos los `<a>`, `<link>`, `<script>`, `<img>`:

| | Resultado |
|---|---|
| Páginas HTML | **166 / 166 OK** (0 rotas) |
| Assets (css/js/img/fuentes) | **493 / 493 OK** |
| Formularios (POST) | login, registro, logout, carrito, checkout, contacto, opiniones, seguimiento → **todos OK** |
| Admin (`/admin`, `/admin/mensajes`, `/admin/pedidos/{n}`) | **OK** con Basic Auth |

### Correcciones aplicadas

1. **`POST /mi-cuenta` daba 405** → rutas `account.handle` / `account.logout` + `AccountController` completo (login por email o nombre, registro con auto-login, cierre de sesión). `User` con `$fillable` explícito (los atributos `#[Fillable]` no existen en Laravel 12.43).
2. **`/carrito/agregar` daba 405 al seguir el enlace** de las tarjetas de producto → nueva ruta `GET /carrito/agregar/{ref}` (`cart.add.quick`) como *fallback* sin JavaScript; el `<a>` de la tarjeta apunta ahí y el JS sigue interceptando para el AJAX.
3. **Home: 21 enlaces WordPress muertos** (`index<hash>.html?add-to-cart=…`, `?add_to_wishlist=…`, `producto/<slug>/index.html`) → reescritos a `/carrito/agregar/<slug>`, `/favoritos` y `/producto/<slug>`.

## Antes de desplegar

```env
APP_ENV=production
APP_DEBUG=false
APP_URL=https://tu-dominio.com
```

```bash
composer install --no-dev --optimize-autoloader
php artisan migrate --force            # o migrate:fresh --seed en un entorno nuevo
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan storage:link               # si se usan uploads
```

- **Admin**: usuario/clave en `.env` → `ADMIN_USER` / `ADMIN_PASSWORD` (actual: `admin` / `remolquestitos`). Cámbialos.
- **Email**: `MAIL_MAILER=log` por defecto. Para envíos reales configurar SMTP (`MAIL_MAILER=smtp`, host, usuario, contraseña, `MAIL_ADMIN_ADDRESS`).
- Servir con **nginx/apache + php-fpm** (no `php artisan serve`). Raíz web → `public/`.
- Permisos de escritura en `storage/` y `bootstrap/cache/`.
- Base de datos: SQLite en `database/database.sqlite` (o migrar a MySQL cambiando `DB_*`).

## Re-ejecutar la auditoría

```bash
php artisan serve --port=8000 &
python3 linkcheck.py        # sale con código !=0 si algo está roto
```
