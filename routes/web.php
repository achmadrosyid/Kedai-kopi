<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerOrderController;
use App\Http\Controllers\SalesReportController;
use App\Http\Controllers\CashierController;
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
Route::get('/kedai-kopi-super',[KedaiKopiSuperController::class, 'index'])->name('kedai-kopi-super.index');
Route::get('/order',[OrderController::class, 'index'])->name('order.index');

Route::get('/home',[HomeController::class, 'index'])->name('home.index');
Route::group(['prefix'=>'product'],function (){
    Route::get('/',[ProductController::class, 'index'])->name('product.index');
    Route::post('/store',[ProductController::class,'store'])->name('product.store');
    Route::get('/getCategory',[ProductController::class, 'getCategory'])->name('product.getCategory');
    Route::get('/uploadImage',[ProductController::class,'uploadImage']);
    Route::post('/storeImage',[ProductController::class,'storeImage'])->name('product.storeImage');
});
Route::group(['prefix'=>'category'],function (){
    Route::get('/',[CategoryController::class, 'index'])->name('category.index');
    Route::post('/store',[CategoryController::class,'store'])->name('category.store');
    Route::get('/edit/{id}',[CategoryController::class, 'edit'])->name('category.edit');
    Route::post('/update',[CategoryController::class,'update'])->name('category.update');
});
Route::get('/customer-order',[CustomerOrderController::class, 'index'])->name('customer-order.index');
Route::get('/sales-report',[SalesReportController::class, 'index'])->name('sales-report.index');
Route::group(['prefix'=>'cashier'],function (){
    Route::get('/',[CashierController::class, 'index'])->name('cashier.index');
    Route::post('/store',[CashierController::class,'store'])->name('cashier.store');
});

// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
