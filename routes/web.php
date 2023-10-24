<?php

use App\Http\Controllers\DashboardController;
use App\Http\Livewire\Home;
use App\Http\Livewire\Client;
use App\Http\Livewire\CartArea;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Livewire\Products\SingleProduct;
use App\Http\Controllers\OrderStatusController;
use App\Http\Controllers\SiteMapController;
use App\Http\Controllers\TermsController;
use App\Http\Livewire\GelleryListing;
use App\Http\Livewire\Products\ProductsListing;

Route::get('/', Home::class)->name('home');

Route::get('/dashboard', [DashboardController::class, 'index'])
->middleware(['auth', 'verified', 'is_admin'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/client', Client::class)->name('client');
    Route::get('/cart', CartArea::class)->name('cart');
});

Route::get('/terms-of-service', [TermsController::class, 'terms'])->name('terms');
Route::get('/privacy-policy', [TermsController::class, 'policy'])->name('policy');

Route::get('/cancel/{checkout_id}', [OrderStatusController::class, 'cancel']);
Route::get('/success/{checkout_id}', [OrderStatusController::class, 'success']);

Route::middleware(['auth', 'verified', 'is_admin'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/products/listing', ProductsListing::class)->name('products.listing');

    Route::get('gellery', GelleryListing::class)->name('gellery');

    Route::get('/product/create', [ProductController::class, 'index'])->name('create.product');
    Route::post('/product/create', [ProductController::class, 'store']);
});

Route::get('/product/{product:slug}', SingleProduct::class)->name('single.product');

Route::get('sitemap.xml', [SiteMapController::class, 'index']);

require __DIR__.'/auth.php';