<?php

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
Route::view('/login','pages.login');
Route::view('/profile','pages.profile');
Route::view('/bukuKas','pages.bukuKas');
Route::view('/bukuOperasional','pages.bukuOperasional');
Route::view('/bukuMaterial','pages.bukuMaterial');
Route::view('/bukuAset','pages.bukuAset');
Route::view('/bukuUpah','pages.bukuUpah');
