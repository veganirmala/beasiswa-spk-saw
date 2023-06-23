<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Middleware\Authenticate;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Middleware\Authenticate;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\UserController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);

Route::get('/registrasi', [RegisterController::class, 'index'])->name('register');
Route::post('/registrasi', [RegisterController::class, 'store']);

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/dashboard', [Dashboard::class, 'index']);

//Route::get('/user', [UserController::class, 'index']);
Route::resource('/user', UserController::class);
