<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\RuanganController;
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

Route::prefix('ruangan')->name('ruangan.')->group(function () {
    Route::get('/', [RuanganController::class, 'index'])->name('index');
    Route::get('/tambah', [RuanganController::class, 'create'])->name('create');
    Route::post('/', [RuanganController::class, 'store'])->name('store');
    Route::get('/{id}', [RuanganController::class, 'show'])->name('show');
    Route::get('/{id}/sunting', [RuanganController::class, 'edit'])->name('edit');
    Route::put('/{id}', [RuanganController::class, 'update'])->name('update');
    Route::delete('/{id}', [RuanganController::class, 'destroy'])->name('destroy');
});
