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
   Route::get('/home','index')->name('home')->middleware('auth');
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
   Route::get('/pinjaman','index')->name('pinjaman')->middleware('auth');
   Route::post('/tambahpinjaman','store')->name('tambahpinjaman');
   Route::get('/deletedpinjaman/{id}','deleted')->name('deletedpinjaman');
   Route::get('/getdatapinjamanByid/{id}', 'getDatapinjamanByid');
   Route::post('/updatepinjaman/{id}', 'edit');
   Route::get('/pinjaman/retunred', 'retunred')->name('retunred')->middleware('auth');
   Route::get('/pinjaman/restored', 'restored')->name('restored')->middleware('auth');
   Route::get('/retunredPDF', 'retunredPDF')->name('retunredPDF')->middleware('auth');
   Route::get('/restoredPDF', 'restoredPDF')->name('restoredPDF')->middleware('auth');
   Route::get('/allPDF', 'allPDF')->name('allPDF')->middleware('auth');
});
