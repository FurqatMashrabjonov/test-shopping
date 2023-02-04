<?php

use App\Http\Controllers\Customer\ProductController as CustomerProductController;
use App\Http\Controllers\Seller\ProductController as SellerProductController;
use App\Http\Controllers\Seller\OrderController as SellerOrderController;
use App\Http\Controllers\Customer\OrderController as CustomerOrderController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::middleware('auth')->group(function () {
    Route::view('about', 'about')->name('about');

    Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');

    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
});

//for customers [products]
Route::controller(CustomerProductController::class)
    ->prefix('/p')
    ->as('p.customer.')
    ->middleware(['auth', 'customer'])
    ->group(__DIR__ . '/products/customer/index.php');


//for sellers [products]
Route::controller(SellerProductController::class)
    ->prefix('/products')
    ->as('products.seller.')
    ->middleware(['auth', 'seller'])
    ->group(__DIR__ . '/products/seller/index.php');


//for customers [orders]
Route::controller(CustomerOrderController::class)
    ->prefix('/o')
    ->as('o.customer.')
    ->middleware(['auth', 'customer'])
    ->group(__DIR__ . '/orders/customer/index.php');

//for sellers [orders]
Route::controller(SellerOrderController::class)
    ->prefix('/orders')
    ->as('orders.seller.')
    ->middleware(['auth', 'seller'])
    ->group(__DIR__ . '/orders/seller/index.php');
