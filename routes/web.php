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

Route::get('/', function () {
    $salesToday = DB::table('sales')
        ->whereDate('sale_date', Carbon::today())
        ->sum('total_amount');

    $salesYesterday = DB::table('sales')
        ->whereDate('sale_date', Carbon::yesterday())
        ->sum('total_amount');

    $salesThisMonth = DB::table('sales')
        ->whereMonth('sale_date', Carbon::now()->month)
        ->sum('total_amount');
    $salesLastMonth = DB::table('sales')
        ->whereMonth('sale_date', Carbon::now()->subMonth()->month)
        ->sum('total_amount');

    return view('pages.dashboard', [
        'salesToday' => $salesToday,
        'salesYesterday' => $salesYesterday,
        'salesThisMonth' => $salesThisMonth,
        'salesLastMonth' => $salesLastMonth,
    ]);

})->name('dashboard');
Route::get('/product', [ProductController::class, 'index'])->name('product');
Route::get('/sales', [ProductController::class, 'sales'])->name('sales');
Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
Route::get('/product/sell/{id}', [ProductController::class, 'sell'])->name('product.sell');
Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');
Route::post('/product/transaction', [ProductController::class, 'transaction'])->name('product.transaction');
Route::put('/product/update/{id}', [ProductController::class, 'update'])->name('product.update');

