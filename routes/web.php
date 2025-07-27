<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VariantController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('products', ProductController::class)->names('product');

    Route::resource('products', ProductController::class)->names('product');

    Route::prefix('products/{product}')->group(function () {
        Route::get('variants', [VariantController::class, 'index'])->name('variant.index');
        Route::get('variants/create', [VariantController::class, 'create'])->name('variant.create');
        Route::post('variants', [VariantController::class, 'store'])->name('variant.store');
        Route::get('variants/{variant}/edit', [VariantController::class, 'edit'])->name('variant.edit');
        Route::patch('variants/{variant}', [VariantController::class, 'update'])->name('variant.update');
        Route::delete('variants/{variant}', [VariantController::class, 'destroy'])->name('variant.destroy');
    });
});

require __DIR__ . '/auth.php';
