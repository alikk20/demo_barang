<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\BarangController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/dashboard', function () {
	return redirect()->route('barang.index');
});
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::resource('barang', BarangController::class);
    Route::resource('kategori', KategoriController::class);
});
