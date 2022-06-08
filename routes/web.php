<?php

use App\Http\Controllers\HomeController;
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


Route::controller(HomeController::class)->group(function(){
   Route::get('/','index')->middleware('auth');
   Route::get('/tambah_data', 'FromTambahData')->name('tambah_data');
});
// login
Route::controller(LoginController::class)->group(function(){
     Route::get('/login','index');
     Route::post('/authenticate','authenticate')->name('authenticate');
     Route::post('/logout','logout')->name('logout');
});