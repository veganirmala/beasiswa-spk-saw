<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Authenticate;
use App\Http\Controllers\Registrasi;
use App\Http\Controllers\Login;
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
})->middleware(Authenticate::class);

 Route::get('/login', function () {
 return view('auth/login');
 })->name('login');

// Route::get('/registrasi', function () {
//     return view('auth/registrasi');
// })->name('registrasi');

Route::get('/registrasi', [Registrasi::class, 'index']);
Route::post('/registrasi', [Registrasi::class, 'store']);

Route::post('/login', [Login::class, 'authenticate']);
Route::post('/logout', [Login::class, 'logout']);

Route::get('/dashboard', [Dashboard::class, 'index']);
Route::get('/user', [UserController::class, 'index']);