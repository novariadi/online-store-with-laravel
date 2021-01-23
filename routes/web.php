<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Utama;
use App\Http\Controllers\Login;
use App\Http\Controllers\Order;


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

Route::get('/', [Utama::class, 'index']);
Route::post('/pushData', [Utama::class, 'store']);
Route::get('/Login', [Login::class, 'index']);
Route::post('/Daftar', [Login::class, 'register']);
Route::post('/Masuk', [Login::class, 'Masuk']);
Route::get('/Keluar', [Login::class, 'Keluar']);
Route::post('/AddCart', [Order::class, 'Order']);
Route::get('/Keranjang', [Order::class, 'Keranjang']);
