<?php

use App\Http\Controllers\BukuAsetController;
use App\Http\Controllers\BukuKasController;
use App\Http\Controllers\BukuMaterialController;
use App\Http\Controllers\BukuOperasionalController;
use App\Http\Controllers\BukuUpahController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
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
    return view('pages.dashboard');
});

Route::view('/profile', 'pages.profile');
Route::get('/login',[LoginController::class,'index'])->name('login')->middleware('guest');
Route::post('/login',[LoginController::class,'authenticate']);
Route::post('/logout',[LoginController::class,'logout']);

Route::group(['middleware' => ['auth', 'level:supervisor',]], function () {
    Route::get('/dashboard',[HomeController::class,'index']);
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
        Route::get('/bukuoperasional/export', 'export');
    });
    
    #buku material
    Route::controller(BukuMaterialController::class)->group(function () {
        Route::get('/bukumaterial', 'index');
        Route::get('/bukumaterial/export', 'export');
    });

    #buku aset
    Route::controller(BukuAsetController::class)->group(function () {
        Route::get('/bukuaset', 'index');
        Route::get('/bukuaset/export', 'export');
    });

    #buku Upah
    Route::controller(BukuUpahController::class)->group(function () {
        Route::get('/bukuupah', 'index');
        Route::get('/bukuupah/export', 'export');
    });
});

// Route::group(['middleware' => ['auth', 'level:supervisor']], function () {
//     Route::controller(BukuKasController::class)->group(function () {
//         Route::get('/bukukas',  'index');
//         Route::get('/bukukas/export', 'export');
//         Route::get('/bukukas/json',  'json');
//         Route::get('/bukukas/create',  'create');
//         Route::post('/bukukas/save', 'save');
//         Route::get('/bukukas/{id}/edit', 'edit');
//         Route::get('/bukukas/{id}/detail', 'detail');
//         Route::put('/bukukas/{id}', 'update');
//         Route::delete('/bukukas/{id}', 'destroy');
//     });

//     #buku operasional
//     Route::controller(BukuOperasionalController::class)->group(function () {
//         Route::get('/bukuoperasional', 'index');
//         Route::get('/bukuoperasional/export', 'export');
//     });
    
//     #buku material
//     Route::controller(BukuMaterialController::class)->group(function () {
//         Route::get('/bukumaterial', 'index');
//         Route::get('/bukumaterial/export', 'export');
//     });

//     #buku aset
//     Route::controller(BukuAsetController::class)->group(function () {
//         Route::get('/bukuaset', 'index');
//         Route::get('/bukuaset/export', 'export');
//     });

//     #buku Upah
//     Route::controller(BukuUpahController::class)->group(function () {
//         Route::get('/bukuupah', 'index');
//         Route::get('/bukuupah/export', 'export');
//     });
// });

Route::group(['middleware' => ['auth', 'level:direksi']], function () {
    Route::get('/dashboard',[HomeController::class,'index']);
});




