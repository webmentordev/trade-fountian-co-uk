<?php

use App\Http\Controllers\AboutController;
use App\Http\Livewire\Home;
use App\Http\Livewire\Client;
use App\Http\Livewire\CartArea;
use App\Http\Livewire\GelleryListing;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TermsController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SiteMapController;
use App\Http\Controllers\DashboardController;
use App\Http\Livewire\Products\SingleProduct;
use App\Http\Controllers\OrderStatusController;
use App\Http\Controllers\TrackController;
use App\Http\Livewire\Products\ProductsListing;
use App\Mail\Order;
use App\Models\Cart;

Route::get('/', Home::class)->name('home');
Route::get('/products', [ProductController::class, 'show'])->name('products');
Route::get('/products/search', [ProductController::class, 'search'])->name('search');

Route::get('/about', [AboutController::class, 'index'])->name('about');

Route::get('/cart', CartArea::class)->name('cart');

Route::get('/terms-of-service', [TermsController::class, 'terms'])->name('terms');
Route::get('/privacy-policy', [TermsController::class, 'policy'])->name('policy');

Route::get('/track-order', [TrackController::class, 'index'])->name('order.track');
Route::get('/tracking/order', [TrackController::class, 'show'])->name('track.order');

Route::get('/cancel/{checkout_id}', [OrderStatusController::class, 'cancel']);
Route::get('/success/{checkout_id}', [OrderStatusController::class, 'success']);

Route::middleware(['auth', 'verified', 'is_admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::patch('/cart/update/{cart:order_id}', [DashboardController::class, 'update'])->name('update.shipping');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/products/listing', ProductsListing::class)->name('products.listing');

    Route::get('gellery', GelleryListing::class)->name('gellery');

    Route::get('/product/create', [ProductController::class, 'index'])->name('create.product');
    Route::post('/product/create', [ProductController::class, 'store']);

    Route::get('/product/update/{product:id}', [ProductController::class, 'update'])->name('product.update');
    Route::patch('/product/update/{product:id}', [ProductController::class, 'update_product'])->name('update.product');

    Route::get('/reviews', [ReviewController::class, 'index'])->name('reviews');
    Route::get('/create/review', [ReviewController::class, 'create'])->name('create.review');
    Route::post('/post/review', [ReviewController::class, 'store'])->name('post.review');
    
    Route::get('/post/review/{review:id}', [ReviewController::class, 'update'])->name('review.update');
    Route::patch('/post/review/update/{review:id}', [ReviewController::class, 'review_update'])->name('update.review');
});

Route::get('/product/{product:slug}', SingleProduct::class)->name('single.product');

Route::get('sitemap.xml', [SiteMapController::class, 'index']);

Route::get('send', function(){
    return new Order('DJnlEKjehRKUI1SEUOAU', Cart::get());
});

require __DIR__.'/auth.php';