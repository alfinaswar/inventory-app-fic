<?php

use App\Http\Controllers\BarangKeluarController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\MasterBarangController;
use App\Http\Controllers\MasterGudangController;
use App\Http\Controllers\MasterMerkController;
use App\Http\Controllers\MasterSupplierController;
use App\Models\BarangMasuk;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
    Route::post('/laporan/cetak', [LaporanController::class, 'cetak'])->name('laporan.cetak');
    Route::post('/laporan/stok', [LaporanController::class, 'stok'])->name('laporan.stok');
    Route::post('/laporan/barang-masuk', [LaporanController::class, 'BarangMasuk'])->name('laporan.BarangMasuk');
    Route::post('/laporan/barang-keluar', [LaporanController::class, 'BarangKeluar'])->name('laporan.BarangKeluar');
    Route::resource('master-barang', MasterBarangController::class);
    Route::resource('barang-masuk', BarangMasukController::class);
    Route::resource('barang-keluar', BarangKeluarController::class);
    Route::resource('master-supplier', MasterSupplierController::class);
    Route::resource('master-merk', MasterMerkController::class);
    Route::resource('master-gudang', MasterGudangController::class);
});
