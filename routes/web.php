<?php

use App\Http\Controllers\cartController;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\SubkategoriController;

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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/login', [loginController::class, 'index']);
Route::post('/login', [loginController::class, 'loginAuth'])->name('login');
Route::post('/logout', [loginController::class, 'logout']);

//view =========================

Route::get('/dashboard', function () {
    return view('dashboard.index');
})->middleware('auth');

// resource

Route::resource('/dashboard/kategori', KategoriController::class)->middleware('auth');
Route::resource('/dashboard/subkategori', SubkategoriController::class)->middleware('auth');
Route::resource('/dashboard/produk', ProdukController::class)->middleware('auth');

// home
Route::get('/', [HomeController::class, 'index']);
Route::get('/tentang', [HomeController::class, 'tentang']);
Route::get('/pesanan', [HomeController::class, 'cara_pesan']);
Route::get('/produk/{kategori}', [HomeController::class, 'produks']);
Route::get('/detail/{id}', [HomeController::class, 'detail']);
Route::get('/produks', [HomeController::class, 'produk']);
Route::get('/kontak', [HomeController::class, 'kontak']);
Route::post('/kirim', [HomeController::class, 'kirim']);
Route::post('/kirim_barang', [HomeController::class, 'kirim_barang']);
Route::post('/tambah/keranjang/{id}', [HomeController::class, 'tambah_kerangjang']);

// Route::get('/cart', [cartController::class, 'index']);
// Route::post('/cart/{id}', [cartController::class, 'store']);
// Route::post('/cart/destroy/{id}', [cartController::class, 'destroy']);

Route::resource('/cart', cartController::class);
// Route::get('/checkout', cartController::class, 'front_checkout');




Route::get('/keranjang', [HomeController::class, 'keranjang']);