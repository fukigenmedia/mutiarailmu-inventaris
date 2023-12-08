<?php

use App\Http\Controllers\KategoriController;
use Illuminate\Support\Facades\Route;

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

Route::view('/', 'welcome');

Route::get('kategori', [KategoriController::class, 'index'])->name('kategori.index');
Route::get('kategori/tambah', [KategoriController::class, 'create'])->name('kategori.create');
Route::post('kategori', [KategoriController::class, 'store'])->name('kategori.store');
Route::get('kategori/{id}', [KategoriController::class, 'show'])->name('kategori.show');
Route::get('kategori/{id}/sunting', [KategoriController::class, 'edit'])->name('kategori.edit');
Route::put('kategori/{id}', [KategoriController::class, 'update'])->name('kategori.update');
Route::delete('kategori/{id}', [KategoriController::class, 'destroy'])->name('kategori.destroy');
