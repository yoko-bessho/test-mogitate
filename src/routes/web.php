<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Models\Product;

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

Route::get('/products', [ProductController::class, 'index'])->name('products.index');

Route::get('/products/register', [ProductController::class, 'create']);

Route::post('/products/register', [ProductController::class, 'store']);

Route::get('/products/{productId}', [ProductController::class, 'edit'])->name('products.edit');

Route::patch('/products/{productId}/update', [ProductController::class, 'update'])->name('products.update');

Route::delete('/products/{productId}/delete',
[ProductController::class, 'destroy']);