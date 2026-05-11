<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ShowroomController;

Route::get('/', [ProductController::class, 'index'])->name('home');
Route::get('/search', [ProductController::class, 'search'])->name('search');
Route::get('/showroom', [ShowroomController::class, 'index'])->name('showroom');
Route::get('/car/{id}', [ProductController::class, 'show'])->name('car.show');

// Cart Routes
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::get('/add-to-cart/{id}', [CartController::class, 'addToCart'])->name('cart.add');
Route::delete('/remove-from-cart/{id}', [CartController::class, 'remove'])->name('cart.remove');

// Checkout Routes
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/checkout', [CheckoutController::class, 'process'])->name('checkout.process');

Route::get('/dashboard', [\App\Http\Controllers\DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// ── Admin Routes ─────────────────────────────────────────────
use App\Http\Controllers\AdminController;

Route::middleware(['auth', 'role:admin|manager'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/',                              [AdminController::class, 'index'])->name('index');
    // Products
    Route::get('/products',                      [AdminController::class, 'products'])->name('products');
    Route::get('/products/create',               [AdminController::class, 'createProduct'])->name('products.create');
    Route::post('/products',                     [AdminController::class, 'storeProduct'])->name('products.store');
    Route::get('/products/{id}/edit',            [AdminController::class, 'editProduct'])->name('products.edit');
    Route::put('/products/{id}',                 [AdminController::class, 'updateProduct'])->name('products.update');
    Route::delete('/products/{id}',              [AdminController::class, 'deleteProduct'])->name('products.delete');
    // Orders
    Route::get('/orders',                        [AdminController::class, 'orders'])->name('orders');
    Route::patch('/orders/{id}/status',          [AdminController::class, 'updateOrderStatus'])->name('orders.status');
    // Brands
    Route::get('/brands',                        [AdminController::class, 'brands'])->name('brands');
    Route::post('/brands',                       [AdminController::class, 'storeBrand'])->name('brands.store');
    Route::delete('/brands/{id}',                [AdminController::class, 'deleteBrand'])->name('brands.delete');
});
