<?php

namespace App\Providers;

use App\Models\Product;
use App\Models\Variant;
use Illuminate\Support\ServiceProvider;
use App\Observers\Product\ProductObserver;
use App\Observers\Product\VariantObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Product::observe(ProductObserver::class);
        Variant::observe(VariantObserver::class);
    }
}
