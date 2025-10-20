<?php

use App\Http\Controllers\Adm\AdminController;
use App\Http\Controllers\Adm\BebaspustakaController;
use App\Http\Controllers\Adm\DashboardController;
use App\Http\Controllers\Adm\GantipasswordController;
use App\Http\Controllers\Adm\LaporanController;
use App\Http\Controllers\Adm\LoginController;
use App\Http\Controllers\Adm\MahasiswaController;
use App\Http\Controllers\Adm\MhsGantipasswordController;
use App\Http\Controllers\Adm\PengaturanController;
use App\Http\Controllers\Adm\PengaturanLainController;
use App\Http\Controllers\Adm\ProdiController;

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/admloginform', [LoginController::class, 'index'])->name('adm.form.login');
Route::post('/admloginform/proses', [LoginController::class, 'prosesLogin'])->name('adm.post.login');
Route::get('/admlogout/proses', [LoginController::class, 'logout'])->name('adm.logout.proses');


Route::prefix('/admin')->middleware('auth:admin')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::resource('/admin', AdminController::class);
    Route::resource('/mahasiswa', MahasiswaController::class);
    Route::resource('/prodi', ProdiController::class);
    Route::resource('/pengaturan', PengaturanController::class);
    Route::resource('/pengaturanlain', PengaturanLainController::class);

    Route::get('/mhsgantipassword', [MhsGantipasswordController::class, 'formpassword'])->name('mhs.formpassword');
    Route::post('/mhsgantipassword', [MhsGantipasswordController::class, 'passwordproses'])->name('mhs.passwordproses');

    Route::prefix('/bebaspustaka')->name('bebaspustaka.')->group(function () {
        Route::get('/diproses', [BebaspustakaController::class, 'diproses'])->name('diproses');
        Route::get('/perbaikan', [BebaspustakaController::class, 'perbaikan'])->name('perbaikan');
        Route::get('/diterima', [BebaspustakaController::class, 'diterima'])->name('diterima');

        Route::get('/diprosesdetail', [BebaspustakaController::class, 'diprosesdetail'])->name('diprosesdetail');
        Route::post('/diprosesdetailpost', [BebaspustakaController::class, 'savediproses'])->name('savediproses');

        Route::get('/perbaikandetail', [BebaspustakaController::class, 'perbaikandetail'])->name('perbaikandetail');
        Route::post('/perbaikandetailpost', [BebaspustakaController::class, 'saveperbaikan'])->name('saveperbaikan');

        Route::get('/diterimaproses', [BebaspustakaController::class, 'diterimaproses'])->name('diterimaproses');
        Route::post('/diterimaprosespost', [BebaspustakaController::class, 'savediterima'])->name('savediterima');

        Route::get('/kembalikeperbaikan', [BebaspustakaController::class, 'kembalikeperbaikan'])->name('kembalikeperbaikan');

        Route::get('/downloadkartuanggota', [BebaspustakaController::class, 'downloadkartuanggota'])->name('downloadkartuanggota');

        Route::get('/suratbebaspustaka', [BebaspustakaController::class, 'cetaksuratbebaspustaka'])->name('cetaksuratbebaspustaka');
        Route::get('/cetakbuktiupload', [BebaspustakaController::class, 'cetakbuktiupload'])->name('cetakbuktiupload');
    });

    Route::prefix('/laporan')->name('laporan.')->group(function () {
        Route::get('/perbulan', [LaporanController::class, 'perbulan'])->name('perbulan');
        Route::get('/perbulandata', [LaporanController::class, 'perbulandata'])->name('perbulandata');

        Route::get('/pertriwulan', [LaporanController::class, 'pertriwulan'])->name('pertriwulan');
        Route::get('/pertriwulandata', [LaporanController::class, 'pertriwulandata'])->name('pertriwulandata');

        Route::get('/pertahun', [LaporanController::class, 'pertahun'])->name('pertahun');
        Route::get('/pertahundata', [LaporanController::class, 'pertahundata'])->name('pertahundata');
    });

    Route::get('/gantipassword', [GantipasswordController::class, 'formpassword'])->name('ganti.password.form');
    Route::post('/gproses', [GantipasswordController::class, 'passwordproses'])->name('ganti.password.form.proses');
});
