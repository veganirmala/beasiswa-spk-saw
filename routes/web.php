<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Authenticate;

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

Route::get('/registrasi', function () {
    return view('auth/registrasi');
})->name('registrasi');
//Route::get('/login', [Login::class, 'index']);
//Route::post('/login', [Login::class, 'authenticate']);
