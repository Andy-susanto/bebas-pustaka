<?php

use App\Http\Controllers\Depan\MhsController;
use App\Http\Controllers\Depan\WebController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/',[WebController::class,'index'])->name('web.depan');
Route::get('daftarform',[WebController::class,'daftar'])->name('daftar.form');
Route::post('daftarformpost',[WebController::class,'savedaftar'])->name('save.daftar');
Route::get('loginform',[WebController::class,'login'])->name('login.form');
Route::post('loginformpost',[WebController::class,'proseslogin'])->name('proses.login');

Route::get('loginproses',[WebController::class,'logoutproses'])->name('logout.proses');

Route::prefix('/mahasiswa')->middleware('auth:mahasiswa')->name('mahasiswa.') ->group(function(){
    Route::get('/profilsaya',[MhsController::class,'profilsaya'])->name('profilsaya');
    Route::get('/ubahprofilsaya',[MhsController::class,'ubahprofilsaya'])->name('ubahprofilsaya');
    Route::post('/ubahprofilsayasave',[MhsController::class,'ubahprofilsayasave'])->name('ubahprofilsayasave');

    Route::get('/formgantipassword',[MhsController::class,'formgantipassword'])->name('gantipassword.form');
    Route::post('/prosesgantipassword',[MhsController::class,'gantipasswordproses'])->name('gantipassword.form.proses');

    Route::get('/formbebaspustaka',[MhsController::class,'formbebaspustaka'])->name('form.bebaspustaka');
    Route::post('/formbebaspustakapost',[MhsController::class,'prosesbebaspustaka'])->name('form.bebaspustaka.proses');

    Route::get('/lihatkartuanggota',[MhsController::class,'lihatkartuanggota'])->name('view.lihatkartuanggota');
    Route::get('/lihatskripsi',[MhsController::class,'lihatskripsi'])->name('view.lihatskripsi');
    Route::get('/cetaksuratbebaspustaka',[MhsController::class,'cetaksuratbebaspustaka'])->name('cetaksuratbebaspustaka');
    Route::get('/cetakbuktiupload',[MhsController::class,'cetakbuktiupload'])->name('cetakbuktiupload');
});