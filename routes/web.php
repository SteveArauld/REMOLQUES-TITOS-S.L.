<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\WishlistController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/tienda', [ShopController::class, 'index'])->name('shop');
Route::get('/categoria-de-producto/{category:slug}', [ShopController::class, 'category'])->name('category');

Route::get('/producto/{product:slug}', [ProductController::class, 'show'])->name('product.show');
Route::get('/producto/{product:slug}/quickview', [ProductController::class, 'quickView'])->name('product.quickview');
Route::get('/vista-rapida/{ref}', [ProductController::class, 'quickViewByRef'])->name('product.quickview.ref');
Route::post('/producto/{product:slug}/opiniones', [ProductController::class, 'storeReview'])->name('product.review');

Route::get('/carrito', [CartController::class, 'index'])->name('cart.index');
Route::post('/carrito/agregar', [CartController::class, 'add'])->name('cart.add');
Route::get('/carrito/agregar/{ref}', [CartController::class, 'addQuick'])->name('cart.add.quick');
Route::get('/carrito/contador', [CartController::class, 'count'])->name('cart.count');
Route::get('/carrito/fragmento', [CartController::class, 'fragment'])->name('cart.fragment');
Route::post('/carrito/linea', [CartController::class, 'setLineQty'])->name('cart.line');
Route::post('/carrito/eliminar', [CartController::class, 'remove'])->name('cart.remove.post');
Route::patch('/carrito/actualizar', [CartController::class, 'update'])->name('cart.update');
Route::delete('/carrito/eliminar', [CartController::class, 'remove'])->name('cart.remove');

Route::get('/checkout', [CheckoutController::class, 'show'])->name('checkout.show');
Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
Route::get('/pedido/{order:order_number}/gracias', [CheckoutController::class, 'thankYou'])->name('checkout.thankyou');

Route::get('/seguimiento-de-pedidos', [OrderController::class, 'trackingForm'])->name('tracking.form');
Route::post('/seguimiento-de-pedidos', [OrderController::class, 'track'])->name('tracking.track');

Route::get('/favoritos', [WishlistController::class, 'index'])->name('wishlist');
Route::get('/favoritos/items', [WishlistController::class, 'items'])->name('wishlist.items');

Route::get('/mi-cuenta', [AccountController::class, 'index'])->name('account');
Route::post('/mi-cuenta', [AccountController::class, 'handle'])->name('account.handle');
Route::post('/mi-cuenta/salir', [AccountController::class, 'logout'])->name('account.logout');

Route::get('/contacto', [ContactController::class, 'show'])->name('contact');
Route::post('/contacto', [ContactController::class, 'send'])->name('contact.send');

Route::get('/pagina/{slug}', [PageController::class, 'show'])->name('page');

// Compat AJAX du thème Zota (barre de recherche, etc.)
Route::match(['get', 'post'], '/wp-admin/admin-ajax.php', [AjaxController::class, 'adminAjax'])->name('wp.ajax');

// Flux produits Google Merchant Center
// Flux Google Merchant Center : affichage navigateur + téléchargement
Route::get('/feed/google-merchant.xml', [FeedController::class, 'display'])->name('feed.google');
Route::get('/feed/google-merchant.xml/descargar', [FeedController::class, 'download'])->name('feed.google.download');

Route::prefix('admin')->middleware('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminOrderController::class, 'index'])->name('orders');
    Route::get('/pedidos/{order:order_number}', [AdminOrderController::class, 'show'])->name('order');
    Route::patch('/pedidos/{order:order_number}', [AdminOrderController::class, 'updateStatus'])->name('order.status');
    Route::get('/mensajes', [AdminOrderController::class, 'messages'])->name('messages');
});
