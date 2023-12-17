<?php

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [ProductController::class, 'dashboard'])->name('dashboard');
Route::get('/product', [ProductController::class, 'index'])->name('product');
Route::get('/sales', [ProductController::class, 'sales'])->name('sales');
Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
Route::get('/product/sell/{id}', [ProductController::class, 'sell'])->name('product.sell');
Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');
Route::post('/product/transaction', [ProductController::class, 'transaction'])->name('product.transaction');
Route::put('/product/update/{id}', [ProductController::class, 'update'])->name('product.update');

