<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//route to list products
Route::get('products', [ProductController::class, 'index'])->name('products');

// route to add product
Route::get('product/add', [ProductController::class, 'add'])->name('addProduct');

// route to store product
Route::post('product/store', [ProductController::class, 'store'])->name('storeProduct');

// route to edit productID
Route::get('product/edit/{id}', [ProductController::class, 'edit'])->name('editProduct');

// route to list reviews
Route::get('reviews', [ReviewController::class, 'index'])->name('reviews');

// route to create review
Route::get('review/create', [ReviewController::class, 'create'])->name('createReview');

// route to store review
Route::post('review/store', [ReviewController::class, 'store'])->name('storeReview');

// route to edit reviewID
Route::get('review/edit/{id}', [ReviewController::class, 'edit'])->name('editReview');
