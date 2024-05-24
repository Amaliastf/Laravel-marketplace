<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Auth\RegisterController;

Route::get('/', function () {
    return view('welcome');
});

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// // Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
// Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
// Route::resource('products', ProductController::class)->middleware('auth');

// Route::get('/products-all', function () {
//     $products = App\Models\Product::all();
//     return view('products.products-all', compact('products'));
// })->name('products.all');


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/products-all', [ProductController::class, 'allProducts'])->name('products.all');
Route::resource('products', ProductController::class)->middleware('auth');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
Route::get('products/{product}/checkout', [ProductController::class, 'show'])->name('products.checkout');
Route::post('products/{product}/checkout', [ProductController::class, 'checkout'])->name('products.checkout.post');
Route::get('products/{product}/checkout', [ProductController::class, 'showCheckout'])->name('products.checkout');
Route::get('/products/export', [ProductController::class, 'export'])->name('products.export');

Route::get('/profile', [App\Http\Controllers\Auth\RegisterController::class, 'showProfile'])->name('profile.show');

