<?php

use Illuminate\Support\Facades\Route;

use App\HTTP\Controllers\StockController;


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

Route::get('/', [StockController::class, 'index']);
Route::post('/add', [StockController::class, 'addStock'])->name('stock.add');
Route::put('/{stock:id}', [StockController::class, 'updateStock'])->name('stock.update');

