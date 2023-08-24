<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;

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

//Route::get('/admin', function () {
//    return view('dashboard');
//})->middleware('auth');

//Autentikasi
Route::controller(AuthController::class)->group(function () {
    Route::get('/login','index') ->name('login');
    Route::post('/login','authenticate') ->name('auth');
    Route::post('/logout','logout') ->name('logout');
});

//Admin General Page
Route::group(['middleware' => ['auth','level:admin,kasir,manager']], function(){
    Route::resource('/dashboard', DashboardController::class);
});

//Superuser Page
Route::group(['middleware' => ['auth','level:admin,manager']], function(){
    Route::resource('/user', UserController::class);
});

