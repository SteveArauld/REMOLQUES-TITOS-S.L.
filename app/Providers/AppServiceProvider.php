<?php

namespace App\Providers;

use App\Models\Category;
use App\Services\CartService;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(CartService::class);
    }

    public function boot(): void
    {
        // Données partagées par toutes les vues (menu + compteur panier).
        View::composer('*', function ($view) {
            $view->with('navCategories', Category::query()
                ->withCount('products')
                ->has('products')
                ->orderByDesc('products_count')
                ->get());

            $view->with('cart', app(CartService::class));
        });
    }
}
