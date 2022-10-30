<?php

use App\Http\Controllers\AdminPesanController;
use App\Http\Controllers\BarangKeluarController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\CetakLaporanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataBarangController;
use App\Http\Controllers\DataKaryawanController;
use App\Http\Controllers\LaporanBarangKeluarController;
use App\Http\Controllers\LaporanBarangMasukController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\StokBarangController;
use App\Http\Controllers\UserController;

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
    return view('login.index', [
        'title' => 'login'
    ]);
});

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('authenticate');
Route::post('/logout', [LoginController::class, 'logout']);


Route::get('/dashboard', [DashboardController::class, 'indexAdmin'])->middleware('auth');
Route::get('/dashboard', [DashboardController::class, 'indexKaryawan'])->middleware('auth');

Route::resource('/dashboard/pesan', AdminPesanController::class)->middleware('admin');  

Route::resource('/dashboard/profile', UserController::class)->middleware('auth');


Route::resource('/dashboard/DataBarang', DataBarangController::class)->middleware('admin');

Route::resource('/dashboard/DataKaryawan', DataKaryawanController::class)->middleware('admin');

Route::resource('/dashboard/Laporan/BarangMasuk', LaporanBarangMasukController::class)->middleware('admin');
Route::resource('/dashboard/Laporan/BarangKeluar', LaporanBarangKeluarController::class)->middleware('admin');

Route::get('/dashboard/Laporan/barangKeluar/cetak', [CetakLaporanController::class, 'pdf_barangKeluar'])->middleware('auth');
Route::get('/dashboard/Laporan/barangMasuk/cetak', [CetakLaporanController::class, 'pdf_barangMasuk'])->middleware('auth');


Route::resource('/dashboard/InputBarang/BarangMasuk', BarangMasukController::class)->middleware('karyawan');

Route::resource('/dashboard/InputBarang/BarangKeluar', BarangKeluarController::class)->middleware('karyawan');

Route::get('/dashboard/stokBarang', [StokBarangController::class, 'indexStok'])->middleware('karyawan');
