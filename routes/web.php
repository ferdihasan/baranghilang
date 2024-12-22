<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostingController;


// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index'])->name('login');
Route::post('/', [HomeController::class, 'index'])->name('login');

Route::post('search', [HomeController::class, 'search']);

// login
Route::post('login', [LoginController::class, 'authenticate'])->middleware('guest');
Route::get('register', [LoginController::class, 'register'])->middleware('guest');
Route::post('register', [LoginController::class, 'simpan_register'])->middleware('guest');
Route::post('logout', [LoginController::class, 'logout'])->middleware('auth');

Route::get('posting-barang', [PostingController::class, 'posting_barang'])->middleware('auth');
Route::post('posting-barang/simpan', [PostingController::class, 'simpan_postingan'])->middleware('auth');
Route::get('barang/{id}', [PostingController::class, 'barang']);
Route::get('barang/edit/{id}', [PostingController::class, 'edit_barang'])->middleware('auth');
Route::get('barang/edit/hapus-image/{id}', [PostingController::class, 'edit_barang_hapus_image'])->middleware('auth');
Route::post('barang/edit/simpan/{id}', [PostingController::class, 'simpan_edit_barang'])->middleware('auth');

Route::get('administrator', [PostingController::class, 'administrator'])->middleware('auth');
// Route::get('administrator', [PostingController::class, 'administrator'])->middleware('auth');


