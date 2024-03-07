<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProdukController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SaintekPageController;
use App\Http\Controllers\TransaksiController;

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

// Route::middleware('loggedin')->group(function() {
//     Route::get('login', 'AuthController@loginView')->name('login-view');
//     Route::post('login', 'AuthController@login')->name('login');
//     Route::get('register', 'AuthController@registerView')->name('register-view');
//     Route::post('register', 'AuthController@register')->name('register');
// });

// Route::get('/', [UserController::class, 'index'])->name('pengguna');
Route::redirect('/', '/dashboard');
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login-proses', [LoginController::class, 'login_proses'])->name('login-proses');

Route::middleware('auth')->group(function () {
    Route::get('logout', 'AuthController@logout')->name('logout');
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::get('page/{layout}/{pageName}', 'PageController@loadPage')->name('page');
    Route::post('/update-stock/{id}', 'PageController@updateStock')->name('edit-stock');

    Route::get('/order', [OrderController::class, 'index'])->name('order');
    Route::get('/stok', [ProdukController::class, 'index'])->name('stok');
    Route::post('/update-stock/{id}', 'ProdukController@update')->name('update-stock');
    Route::get('/order/{OrderId}', [OrderController::class, 'show'])->name('make-order');
    Route::post('/make-order', [OrderController::class, 'store'])->name('store-order');
    Route::post('/add-to-cart/{OrderId}', [CartController::class, 'store'])->name('add-to-cart');
    Route::post('/update-cart/{OrderId}', [CartController::class, 'update'])->name('update-cart');
    Route::delete('/delete-cart/{OrderId}', [CartController::class, 'destroy'])->name('delete-cart');

    Route::post('/checkout/{OrderId}', [TransaksiController::class, 'store'])->name('checkout');
});