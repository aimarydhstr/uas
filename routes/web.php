<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;

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

Route::get('/', [BarangController::class, 'index'])->name('barang');
Route::prefix('/barang')->group(function () {
    Route::post('/', [BarangController::class, 'store'])->name('barang.add');
    Route::put('/{id}', [BarangController::class, 'update'])->name('barang.edit');
    Route::delete('/{id}', [BarangController::class, 'destroy'])->name('barang.delete');
});