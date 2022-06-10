<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
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
});
// login

     Route::get('/login',[LoginController::class,'index'])->middleware('guest');
     Route::post('/login',[LoginController::class,'authenticate'])->name('authenticate');
     Route::post('/logout',[LoginController::class,'logout'])->name('logout');
// });