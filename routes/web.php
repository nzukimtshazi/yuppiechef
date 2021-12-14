<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserController;

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

// route to list users
Route::get('users', [UserController::class, 'index'])->name('users');

// add user
Route::get('user/add', [UserController::class, 'add'])->name('addUser');

// store user
Route::post('user/store', [UserController::class, 'store'])->name('storeUser');

// edit user
Route::get('user/edit/{id}', [UserController::class, 'edit'])->name('editUser');

// update user
Route::PATCH('user/update/{id}', [UserController::class, 'update'])->name('updateUser');

// show the login form
Route::get('login', [UserController::class, 'showLogin'])->name('login');

// process the login form
Route::post('login', array(UserController::class, 'doLogin'))->name('login');

// process the logout
Route::get('users/logout', [UserController::class, 'doLogout'])->name('logout');

//route to list products
Route::get('products', [ProductController::class, 'index'])->name('products');

// route to add product
Route::get('product/add', [ProductController::class, 'add'])->name('addProduct');

// route to store product
Route::post('product/store', [ProductController::class, 'store'])->name('storeProduct');

// route to edit productID
Route::get('product/edit/{id}', [ProductController::class, 'edit'])->name('editProduct');

// route to update product
Route::PATCH('product/update/{id}', [ProductController::class, 'update'])->name('updateProduct');

// route to list reviews
Route::get('reviews', [ReviewController::class, 'index'])->name('reviews');

// route to create review
Route::get('review/create', [ReviewController::class, 'create'])->name('createReview');

// route to store review
Route::post('review/store', [ReviewController::class, 'store'])->name('storeReview');

// route to edit reviewID
Route::get('review/edit/{id}', [ReviewController::class, 'edit'])->name('editReview');

// route to update review
Route::PATCH('review/update/{id}', [ReviewController::class, 'update'])->name('updateReview');
