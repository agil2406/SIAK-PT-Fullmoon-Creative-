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
Route::get('/bukukas', [BukuKasController::class, 'index']);
Route::get('/bukukas/create', [BukuKasController::class, 'create']);
Route::post('/bukukas/save', [BukuKasController::class, 'save']);
Route::get('/bukukas/{id}/edit', [BukuKasController::class, 'edit']);
Route::put('/bukukas/{id}', [BukuKasController::class, 'update']);
Route::delete('/bukukas/{id}', [BukuKasController::class, 'destroy']);

#buku operasional
Route::get('/bukuoperasional', [BukuOperasionalController::class, 'index']);
Route::get('/bukuoperasional/create', [BukuOperasionalController::class, 'create']);
Route::post('/bukuoperasional/save', [BukuOperasionalController::class, 'save']);
Route::get('/bukuoperasional/{id}/edit', [BukuOperasionalController::class, 'edit']);
Route::put('/bukuoperasional/{id}', [BukuOperasionalController::class, 'update']);
Route::delete('/bukuoperasional/{id}', [BukuOperasionalController::class, 'destroy']);

#buku material
Route::get('/bukumaterial', [BukuMaterialController::class, 'index']);
Route::get('/bukumaterial/create', [BukuMaterialController::class, 'create']);
Route::post('/bukumaterial/save', [BukuMaterialController::class, 'save']);
Route::get('/bukumaterial/{id}/edit', [BukuMaterialController::class, 'edit']);
Route::put('/bukumaterial/{id}', [BukuMaterialController::class, 'update']);
Route::delete('/bukumaterial/{id}', [BukuMaterialController::class, 'destroy']);

#buku aset
Route::get('/bukuaset', [BukuAsetController::class, 'index']);
Route::get('/bukuaset/create', [BukuAsetController::class, 'create']);
Route::post('/bukuaset/save', [BukuAsetController::class, 'save']);
Route::get('/bukuaset/{id}/edit', [BukuAsetController::class, 'edit']);
Route::put('/bukuaset/{id}', [BukuAsetController::class, 'update']);
Route::delete('/bukuaset/{id}', [BukuAsetController::class, 'destroy']);

#buku Upah
Route::get('/bukuupah', [BukuUpahController::class, 'index']);
Route::get('/bukuupah/create', [BukuupahController::class, 'create']);
Route::post('/bukuupah/save', [BukuupahController::class, 'save']);
Route::get('/bukuupah/{id}/edit', [BukuupahController::class, 'edit']);
Route::put('/bukuupah/{id}', [BukuupahController::class, 'update']);
Route::delete('/bukuupah/{id}', [BukuupahController::class, 'destroy']);
