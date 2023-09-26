<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::group(['middleware'=>['AuthLogin']], function () {
    Route::get('/login',[AuthController::class, 'login'])->name('login')->middleware('AuthLogin');
    Route::post('/userLogin',[AuthController::class, 'loginAuth'])->name('userLogin')->middleware('AuthLogin');
    Route::get('/register',[AuthController::class, 'register'])->name('register')->middleware('AuthLogin');
    Route::post('/userRegister',[AuthController::class, 'registerAuth'])->name('userRegister')->middleware('AuthLogin');
});

Route::group(['middleware'=>['AuthCheck']], function(){
    Route::get('/',[AuthController::class, 'home'])->name('home');
});

Route::get('/logout',[AuthController::class, 'logout'])->name('logout');