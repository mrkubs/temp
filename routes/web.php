<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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

Route::get('/admin', function () {
    return view('welcome');
})->middleware('auth');

Route::controller(AuthController::class)->group(function () {
    Route::get('/login','index') ->name('login');
    Route::post('/login','authenticate') ->name('auth');
    Route::post('/logout','logout') ->name('logout');
//->middleware('guest')
});