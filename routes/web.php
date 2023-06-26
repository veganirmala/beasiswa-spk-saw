<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Middleware\Authenticate;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Middleware\Authenticate;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\JenisBeasiswaController;
use App\Http\Controllers\JenisPrestasiController;

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

Route::get('/user', [UserController::class, 'index']);
Route::get('/user/create', [UserController::class, 'create']);
Route::post('/user/create', [UserController::class, 'store']);
Route::get('/user/{id}/edit', [UserController::class, 'edit']);
Route::get('/user/{id}/show', [UserController::class, 'show']);
Route::put('/user/{id}', [UserController::class, 'update']);
Route::delete('/user/{id}', [UserController::class, 'destroy']);
//Route::resource('/user', UserController::class);

Route::get('/jurusan', [JurusanController::class, 'index']);
Route::get('/jurusan/create', [JurusanController::class, 'create']);
Route::post('/jurusan/create', [JurusanController::class, 'store']);
Route::get('/jurusan/{id}/edit', [JurusanController::class, 'edit']);
Route::get('/jurusan/{id}/show', [JurusanController::class, 'show']);
Route::put('/jurusan/{id}', [JurusanController::class, 'update']);
Route::delete('/jurusan/{id}', [JurusanController::class, 'destroy']);

Route::get('/jenisbeasiswa', [JenisBeasiswaController::class, 'index']);
Route::get('/jenisbeasiswa/create', [JenisBeasiswaController::class, 'create']);
Route::post('/jenisbeasiswa/create', [JenisBeasiswaController::class, 'store']);
Route::get('/jenisbeasiswa/{id}/edit', [JenisBeasiswaController::class, 'edit']);
Route::get('/jenisbeasiswa/{id}/show', [JenisBeasiswaController::class, 'show']);
Route::put('/jenisbeasiswa/{id}', [JenisBeasiswaController::class, 'update']);
Route::delete('/jenisbeasiswa/{id}', [JenisBeasiswaController::class, 'destroy']);

Route::get('/jenisprestasi', [JenisPrestasiController::class, 'index']);
Route::get('/jenisprestasi/create', [JenisPrestasiController::class, 'create']);
Route::post('/jenisprestasi/create', [JenisPrestasiController::class, 'store']);
Route::get('/jenisprestasi/{id}/edit', [JenisPrestasiController::class, 'edit']);
Route::get('/jenisprestasi/{id}/show', [JenisPrestasiController::class, 'show']);
Route::put('/jenisprestasi/{id}', [JenisPrestasiController::class, 'update']);
Route::delete('/jenisprestasi/{id}', [JenisPrestasiController::class, 'destroy']);