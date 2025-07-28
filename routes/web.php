<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VariantController;
use App\Http\Controllers\RequestInventoryController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Product public
    Route::resource('products', ProductController::class)->names('product')->only(['index', 'show']);

    // Variant public (view list variant per product)
    Route::get('products/{product}/variants', [VariantController::class, 'index'])->name('variant.index');

    // Request
    Route::get('requests/create', [RequestInventoryController::class, 'create'])->name('request.create');
    Route::post('requests', [RequestInventoryController::class, 'store'])->name('request.store');

    // Admin-only routes
    Route::middleware(['role:admin'])->group(function () {
        // Product CRUD (selain index/show)
        Route::get('products/create', [ProductController::class, 'create'])->name('product.create');
        Route::post('products', [ProductController::class, 'store'])->name('product.store');
        Route::get('products/{product}/edit', [ProductController::class, 'edit'])->name('product.edit');
        Route::patch('products/{product}', [ProductController::class, 'update'])->name('product.update');
        Route::delete('products/{product}', [ProductController::class, 'destroy'])->name('product.destroy');

        // Variant CRUD (admin)
        Route::prefix('products/{product}')->group(function () {
            Route::get('variants/create', [VariantController::class, 'create'])->name('variant.create');
            Route::post('variants', [VariantController::class, 'store'])->name('variant.store');
            Route::get('variants/{variant}/edit', [VariantController::class, 'edit'])->name('variant.edit');
            Route::patch('variants/{variant}', [VariantController::class, 'update'])->name('variant.update');
            Route::delete('variants/{variant}', [VariantController::class, 'destroy'])->name('variant.destroy');
        });

        // Request Admin List
        Route::get('requests', [RequestInventoryController::class, 'index'])->name('request.index');
        Route::get('requests/{request}', [RequestInventoryController::class, 'show'])->name('request.show');
        Route::patch('/request/{id}/approve', [RequestInventoryController::class, 'approve'])->name('request.approve');
    });
});

require __DIR__ . '/auth.php';
