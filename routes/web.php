<?php

use App\Http\Livewire\Home;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Livewire\Products\ProductsCreate;
use App\Http\Livewire\Products\ProductsListing;


Route::get('/', Home::class)->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/products/listing', ProductsListing::class)->name('products.listing');
    Route::get('/products/create', ProductsCreate::class)->name('products.create');
});

require __DIR__.'/auth.php';