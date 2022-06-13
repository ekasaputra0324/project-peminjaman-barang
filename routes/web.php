<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PinjamanController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Authenticate;
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


Route::controller(HomeController::class)->group(function(){
   Route::get('/home','index')->middleware('auth');
   Route::get('/','index')->middleware('auth');
   Route::post('/tambah_data', 'store')->name('tambahdata');
   Route::get('/deleted/{id}', 'delete')->name('deleted');
   Route::get('/getbarangByid/{id}', 'getdata')->name('getdata');
   Route::post('/ubah_data/{id}', 'update')->name('update');
});
// login
Route::controller(LoginController::class)->group(function(){
   Route::get('/login','index')->middleware('guest');
   Route::post('/login','authenticate')->name('authenticate');
   Route::get('/logout','logout')->name('logout');
});
// data pinjamana
Route::controller(PinjamanController::class)->group(function(){
   Route::get('/pinjaman','index')->middleware('auth');
});