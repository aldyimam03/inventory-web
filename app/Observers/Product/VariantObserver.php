<?php

namespace App\Observers\Product;

use App\Models\Variant;
use Illuminate\Support\Str;

class VariantObserver
{
    /**
     * Handle the Variant "created" event.
     */
    public function creating(Variant $variant): void
    {
        if (empty($variant->slug)) {
            $variant->slug = $this->generateUniqueSlug($variant->name);
        }
    }

    /**
     * Handle the Variant "updated" event.
     */
    public function updating(Variant $variant): void
    {
        if ($variant->isDirty('name')) {
            $variant->slug = $this->generateUniqueSlug($variant->name);
        }
    }

    /**
     * Handle the Variant "deleted" event.
     */
    public function deleted(Variant $variant): void
    {
        //
    }

    /**
     * Handle the Variant "restored" event.
     */
    public function restored(Variant $variant): void
    {
        //
    }

    /**
     * Handle the Variant "force deleted" event.
     */
    public function forceDeleted(Variant $variant): void
    {
        //
    }

    private function generateUniqueSlug(string $name): string
    {
        $baseSlug = Str::slug($name);

        do {
            $randomString = Str::random(4);
            $slug = $baseSlug . '-' . strtolower($randomString);
        } while (Variant::where('slug', $slug)->exists());

        return $slug;
    }
}
