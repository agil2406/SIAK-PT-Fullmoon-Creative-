<?php

use App\Http\Controllers\BukuAsetController;
use App\Http\Controllers\BukuKasController;
use App\Http\Controllers\BukuMaterialController;
use App\Http\Controllers\BukuOperasionalController;
use App\Http\Controllers\BukuUpahController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RekapController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

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
    return view('pages.login');
});

Route::view('/profile', 'pages.profile');
Route::get('/login',[LoginController::class,'index'])->name('login')->middleware('guest');
Route::post('/login',[LoginController::class,'authenticate'])->name('login')->middleware('guest');;
Route::post('/logout',[LoginController::class,'logout']);
Route::get('/dashboard',[HomeController::class,'index']);

Route::middleware('auth')->group(function(){
    Route::controller(BukuKasController::class)->group(function () {
        Route::get('/bukukas',  'index');
        Route::get('/bukukas/export', 'export');
        Route::get('/bukukas/json',  'json');
        Route::get('/bukukas/create',  'create');
        Route::post('/bukukas/save', 'save');
        Route::get('/bukukas/{id}/edit', 'edit');
        Route::get('/bukukas/{id}/detail', 'detail');
        Route::put('/bukukas/{id}', 'update');
        Route::delete('/bukukas/{id}', 'destroy');
    });
    
    #buku operasional
    Route::controller(BukuOperasionalController::class)->group(function () {
        Route::get('/bukuoperasional', 'index');
        Route::get('/carioperasional', 'cari');
        Route::get('/bukuoperasional/export/{dari}/{sampai}', 'export');
    });

    #buku material
    Route::controller(BukuMaterialController::class)->group(function () {
        Route::get('/bukumaterial', 'index');
        Route::get('/carimaterial', 'cari');
        Route::get('/bukumaterial/export/{dari}/{sampai}', 'export');
    });

    #buku aset
    Route::controller(BukuAsetController::class)->group(function () {
        Route::get('/bukuaset', 'index');
        Route::get('/cariaset', 'cari');
        Route::get('/bukuaset/export/{dari}/{sampai}', 'export');
    });

    #buku Upah
    Route::controller(BukuUpahController::class)->group(function () {
        Route::get('/bukuupah', 'index');
        Route::get('/cariupah', 'cari');
        Route::get('/bukuupah/export/{dari}/{sampai}', 'export');
    });
    Route::controller(RekapController::class)->group(function () {
        Route::get('/rekap', 'index');
        Route::get('/buatrekap', 'cari');
        Route::post('/buatrekap/save', 'save');
        Route::get('/pengajuan', 'pengajuan');
        Route::get('/laporan', 'Lrekap')->middleware('admin');
        Route::get('/dashboard', 'adminRekap');
        Route::get('/rekap/{id}/detail', 'detail');
        Route::get('/rekap/{id}/setuju', 'setuju');
        Route::get('/rekap/{id}/tolak', 'tolak');
    });

});



   



