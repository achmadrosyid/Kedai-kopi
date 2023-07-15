<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerOrderController;
use App\Http\Controllers\SalesReportController;
use App\Http\Controllers\CashierController;
use App\Http\Controllers\MejaController;
use App\Http\Controllers\KedaiKopiSuperController;
use App\Http\Controllers\OrderController;

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
    return view('layouts.master');
});
Route::get('/home',[HomeController::class, 'index'])->name('home.index');
Route::group(['prefix'=>'product'],function (){
    Route::get('/',[ProductController::class, 'index'])->name('product.index');
    Route::post('/store',[ProductController::class,'store'])->name('product.store');
    Route::get('/getCategory',[ProductController::class, 'getCategory'])->name('product.getCategory');
    Route::get('/uploadImage',[ProductController::class,'uploadImage']);
    Route::post('/storeImage',[ProductController::class,'storeImage'])->name('product.storeImage');
    Route::get('/edit/{id}',[ProductController::class, 'edit'])->name('product.edit');
    Route::post('/update',[ProductController::class,'update'])->name('product.update');
    Route::delete('/delete/{id}',[ProductController::class,'delete'])->name('product.delete');
});
Route::group(['prefix'=>'category'],function (){
    Route::get('/',[CategoryController::class, 'index'])->name('category.index');
    Route::post('/store',[CategoryController::class,'store'])->name('category.store');
    Route::get('/edit/{id}',[CategoryController::class, 'edit'])->name('category.edit');
    Route::post('/update',[CategoryController::class,'update'])->name('category.update');
    Route::delete('/delete/{id}',[CategoryController::class,'delete'])->name('category.delete');
});
Route::group(['prefix'=>'customer-order'],function (){
    Route::get('/',[CustomerOrderController::class, 'index'])->name('customer-order.index');
});
Route::get('/sales-report',[SalesReportController::class, 'index'])->name('sales-report.index');
Route::group(['prefix'=>'cashier'],function (){
    Route::get('/',[CashierController::class, 'index'])->name('cashier.index');
    Route::post('/store',[CashierController::class,'store'])->name('cashier.store');
    Route::get('/edit/{id}',[CashierController::class, 'edit'])->name('cashier.edit');
    Route::post('/update',[CashierController::class,'update'])->name('cashier.update');
    Route::delete('/delete/{id}',[CashierController::class,'delete'])->name('cashier.delete');
});
Route::group(['prefix'=>'meja'],function (){
    Route::get('/',[MejaController::class, 'index'])->name('meja.index');
    Route::post('/store',[MejaController::class,'store'])->name('meja.store');
    Route::get('/edit/{id}',[MejaController::class, 'edit'])->name('meja.edit');
    Route::post('/update',[MejaController::class,'update'])->name('meja.update');
    Route::delete('/delete/{id}',[MejaController::class,'delete'])->name('meja.delete');
    Route::post('/printQR',[MejaController::class, 'printQR'])->name('meja.printQR');
});
Route::group(['prefix'=>'kedai-kopi-super'],function (){
    Route::get('/',[KedaiKopiSuperController::class, 'index'])->name('kedai-kopi-super.index');
});
Route::get('/order',[OrderController::class, 'index'])->name('order.index');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
