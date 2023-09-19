<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PesananPelangganController;
use App\Http\Controllers\LaporanPenjualanController;
use App\Http\Controllers\CashierController;
use App\Http\Controllers\CustomerOrder;
use App\Http\Controllers\CustomerOrderController;
use App\Http\Controllers\MejaController;
use App\Http\Controllers\OrderController;
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

Route::group(['middleware' => ['auth']], function () {
    Route::get('/', function () {
        return view('layouts.master');
    });
    Route::get('/home', [HomeController::class, 'index'])->name('home.index');
    Route::get('/getSalesPerMonth',[HomeController::class,'getSalesPerMont']);
    Route::group(['prefix' => 'product'], function () {
        Route::get('/', [ProductController::class, 'index'])->name('product.index');
        Route::post('/store', [ProductController::class, 'store'])->name('product.store');
        Route::get('/getCategory', [ProductController::class, 'getCategory'])->name('product.getCategory');
        Route::get('/uploadImage', [ProductController::class, 'uploadImage']);
        Route::post('/storeImage', [ProductController::class, 'storeImage'])->name('product.storeImage');
        Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
        Route::post('/update', [ProductController::class, 'update'])->name('product.update');
        Route::delete('/delete/{id}', [ProductController::class, 'delete'])->name('product.delete');
    });
    Route::group(['prefix' => 'category'], function () {
        Route::get('/', [CategoryController::class, 'index'])->name('category.index');
        Route::post('/store', [CategoryController::class, 'store'])->name('category.store');
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
        Route::post('/update', [CategoryController::class, 'update'])->name('category.update');
        Route::delete('/delete/{id}', [CategoryController::class, 'delete'])->name('category.delete');
    });
    Route::group(['prefix' => 'pesanan-pelanggan'], function () {
        Route::get('/', [CustomerOrderController::class, 'index'])->name('pesanan-pelanggan.index');
        Route::get('/getDetil/{id}', [CustomerOrderController::class, 'getDetilOrder'])->name('pesanan-pelanggan.getDetil');
        Route::post('/purchase', [CustomerOrderController::class, 'purchase'])->name('pesanan-pelanggan.purchase');
        Route::post('/deliverOrder', [CustomerOrderController::class, 'deliverOrder'])->name('pesanan-pelanggan.deliverOrder');
    });

    Route::group(['prefix' => 'laporan-penjualan'], function () {
        Route::get('/', [LaporanPenjualanController::class, 'index'])->name('laporan-penjualan.index');
        Route::get('/search',[LaporanPenjualanController::class,'search'])->name('laporan-penjualan.search');
    });
    Route::group(['prefix' => 'cashier'], function () {
        Route::get('/', [CashierController::class, 'index'])->name('cashier.index');
        Route::post('/store', [CashierController::class, 'store'])->name('cashier.store');
        Route::get('/edit/{id}', [CashierController::class, 'edit'])->name('cashier.edit');
        Route::post('/update', [CashierController::class, 'update'])->name('cashier.update');
        Route::delete('/delete/{id}', [CashierController::class, 'delete'])->name('cashier.delete');
    });
    Route::group(['prefix' => 'meja'], function () {
        Route::get('/', [MejaController::class, 'index'])->name('meja.index');
        Route::post('/store', [MejaController::class, 'store'])->name('meja.store');
        Route::get('/edit/{id}', [MejaController::class, 'edit'])->name('meja.edit');
        Route::post('/update', [MejaController::class, 'update'])->name('meja.update');
        Route::delete('/delete/{id}', [MejaController::class, 'delete'])->name('meja.delete');
        Route::post('/printQR', [MejaController::class, 'printQR'])->name('meja.printQR');
    });
    Route::group(['prefix' => 'user'], function () {
        Route::get('/', [UserController::class, 'index'])->name('user.index');
        Route::get('/getCashier', [UserController::class, 'getCashier'])->name('user.getCashierPegawai');
        Route::post('/store', [UserController::class, 'store'])->name('user.store');
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
        Route::post('/update', [UserController::class, 'update'])->name('user.update');
        Route::delete('/delete/{id}', [UserController::class, 'delete'])->name('user.delete');
        Route::get('/search', [UserController::class, 'search'])->name('user.search');
    });
});
Route::group(['prefix' => 'order'], function () {
    Route::get('/{id?}', [OrderController::class, 'index'])->name('order.index');
    Route::get('/category/{category}', [OrderController::class, 'category'])->name('order.category');
    Route::get('/getProduct/{category}', [OrderController::class, 'getProduct'])->name('order.getProduct');
    Route::post('/insertCart', [OrderController::class, 'insertCart'])->name('order.insertCart');
    Route::post('/getDataCart', [OrderController::class, 'getDataCart'])->name('order.getDataCart');
    Route::post('/removeItemFromCart', [OrderController::class, 'removeItemFromCart'])->name('order.removeItemFromCart');
    Route::post('/purchase', [OrderController::class, 'purchase'])->name('order.purchase');
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
