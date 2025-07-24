<?php

namespace App\Observers\Product;

use App\Models\Product;
use Illuminate\Support\Str;

class ProductObserver
{
    /**
     * Handle the Product "created" event.
     */
    public function creating(Product $product): void
    {
        if (empty($product->slug)) {
            $product->slug = $this->generateUniqueSlug($product->name);
        }
    }

    /**
     * Handle the Product "updated" event.
     */
    public function updating(Product $product): void
    {
        if ($product->isDirty('name')) {
            $product->slug = $this->generateUniqueSlug($product->name);
        }
    }

    /**
     * Handle the Product "deleted" event.
     */
    public function deleted(Product $product): void
    {
        //
    }

    /**
     * Handle the Product "restored" event.
     */
    public function restored(Product $product): void
    {
        //
    }

    /**
     * Handle the Product "force deleted" event.
     */
    public function forceDeleted(Product $product): void
    {
        //
    }


    private function generateUniqueSlug(string $name): string
    {
        $baseSlug = Str::slug($name);

        do {
            $randomString = Str::random(4);
            $slug = $baseSlug . '-' . strtolower($randomString);
        } while (Product::where('slug', $slug)->exists());

        return $slug;
    }
}
