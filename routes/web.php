<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerOrderController;
use App\Http\Controllers\SalesReportController;
use App\Http\Controllers\CashierController;

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
Route::get('/product',[ProductController::class, 'index'])->name('product.index');
Route::group(['prefix'=>'category'],function (){
    Route::get('/',[CategoryController::class, 'index'])->name('category.index');
    Route::post('/store',[CategoryController::class,'store'])->name('category.store');
});
Route::get('/customer-order',[CustomerOrderController::class, 'index'])->name('customer-order.index');
Route::get('/sales-report',[SalesReportController::class, 'index'])->name('sales-report.index');
Route::get('/cashier',[CashierController::class, 'index'])->name('cashier.index');
