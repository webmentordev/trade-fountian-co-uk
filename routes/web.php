<?php

use App\Http\Livewire\Home;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Livewire\Client;
use App\Http\Livewire\Products\ProductsCreate;
use App\Http\Livewire\Products\ProductsListing;
use App\Http\Livewire\Products\SingleProduct;

Route::get('/', Home::class)->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'is_admin'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/client', Client::class)->name('client');
});


Route::middleware(['auth', 'verified', 'is_admin'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/products/listing', ProductsListing::class)->name('products.listing');
    Route::get('/products/create', ProductsCreate::class)->name('products.create');
});

Route::get('/product/{slug}', SingleProduct::class)->name('single.product');

require __DIR__.'/auth.php';