<?php

use App\Http\Controllers\BukuAsetController;
use App\Http\Controllers\BukuKasController;
use App\Http\Controllers\BukuMaterialController;
use App\Http\Controllers\BukuOperasionalController;
use App\Http\Controllers\BukuUpahController;
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
Route::view('/login', 'pages.login');
Route::view('/profile', 'pages.profile');

#buku kas
Route::controller(BukuKasController::class)->group(function () {
    Route::get('/bukukas',  'index');
    Route::get('/bukukas/export', 'export');
    Route::get('/bukukas/json',  'json');
    Route::get('/bukukas/create',  'create');
    Route::post('/bukukas/save', 'save');
    Route::get('/bukukas/{id}/edit', 'edit');
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
