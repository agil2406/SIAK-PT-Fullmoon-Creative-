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
    Route::get('/bukuoperasional/json', 'json');
    Route::get('/bukuoperasional/create',  'create');
    Route::post('/bukuoperasional/save',  'save');
    Route::get('/bukuoperasional/{id}/edit',  'edit');
    Route::put('/bukuoperasional/{id}',  'update');
    Route::delete('/bukuoperasional/{id}',  'destroy');
});


#buku material
Route::controller(BukuMaterialController::class)->group(function () {
    Route::get('/bukumaterial', 'index');
    Route::get('/bukumaterial/json', 'json');
    Route::get('/bukumaterial/create', 'create');
    Route::post('/bukumaterial/save',  'save');
    Route::get('/bukumaterial/{id}/edit',  'edit');
    Route::put('/bukumaterial/{id}', 'update');
    Route::delete('/bukumaterial/{id}', 'destroy');
});


#buku aset
Route::controller(BukuAsetController::class)->group(function () {
    Route::get('/bukuaset', 'index');
    Route::get('/bukuaset/json', 'json');
    Route::get('/bukuaset/create', 'create');
    Route::post('/bukuaset/save', 'save');
    Route::get('/bukuaset/{id}/edit', 'edit');
    Route::put('/bukuaset/{id}',  'update');
    Route::delete('/bukuaset/{id}',  'destroy');
});


#buku Upah
Route::controller(BukuUpahController::class)->group(function () {
    Route::get('/bukuupah', 'index');
    Route::get('/bukuupah/json', 'json');
    Route::get('/bukuupah/create', 'create');
    Route::post('/bukuupah/save',  'save');
    Route::get('/bukuupah/{id}/edit', 'edit');
    Route::put('/bukuupah/{id}', 'update');
    Route::delete('/bukuupah/{id}', 'destroy');
});
