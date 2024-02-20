<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\PeminjamanController;

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
    return view('welcome');
});



Route::get('/siswa', [SiswaController::class, 'index'])->name('siswa');
Route::get('/siswa/create', [SiswaController::class, 'create'])->name('create');
Route::post('/siswa/store', [SiswaController::class, 'store'])->name('store');
Route::get('/siswa/{id}/edit', [SiswaController::class, 'edit'])->name('edit');
Route::put('/siswa/{id}/update', [SiswaController::class, 'update'])->name('siswa.update');
Route::delete('/siswa/delete/{id}', [SiswaController::class, 'delete'])->name('delete');




Route::get('/barang', [BarangController::class, 'index'])->name('barang');
Route::get('/barang/create', [BarangController::class, 'create'])->name('create');
Route::post('/barang/store', [BarangController::class, 'store'])->name('store');
Route::get('/barang/{id}/edit', [BarangController::class, 'edit'])->name('edit');
Route::put('/barang/{id}/update', [BarangController::class, 'update'])->name('barang.update');
Route::delete('/delete/{id}', [BarangController::class, 'destroy'])->name('destroy');




Route::get('/peminjaman', [PeminjamanController::class, 'index'])->name('peminjaman.index');
Route::get('/peminjaman/create', [PeminjamanController::class, 'create'])->name('create');
Route::post('/peminjaman/store', [PeminjamanController::class, 'store'])->name('store');
Route::get('/peminjaman/{id}/detail', [PeminjamanController::class, 'showDetail'])->name('peminjaman.detail');
Route::get('peminjaman/{id}/edit', [PeminjamanController::class, 'edit'])->name('peminjaman.edit');
Route::put('peminjaman/{id}/update', [PeminjamanController::class, 'update'])->name('peminjaman.update');
Route::delete('peminjaman/{id}', [PeminjamanController::class, 'delete'])->name('peminjaman.delete');

