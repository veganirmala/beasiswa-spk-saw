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
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\TahunUsulanController;
use App\Http\Controllers\BobotKriteriaController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\IPKController;
use App\Http\Controllers\NilaiprestasiController;
use App\Http\Controllers\RekapanbeasiswaController;

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
    return redirect('/dashboard');
});

Route::group(['middleware' => ['guest']], function () {

    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'authenticate'])->name('login-process');

    Route::get('/registrasi', [RegisterController::class, 'index'])->name('register');
    Route::post('/registrasi', [RegisterController::class, 'store'])->name('register-process');
});

Route::group(['middleware' => ['auth']], function () {

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

    Route::get('/prodi', [ProdiController::class, 'index']);
    Route::get('/prodi/create', [ProdiController::class, 'create']);
    Route::post('/prodi/create', [ProdiController::class, 'store']);
    Route::get('/prodi/{id}/edit', [ProdiController::class, 'edit']);
    Route::get('/prodi/{id}/show', [ProdiController::class, 'show']);
    Route::put('/prodi/{id}', [ProdiController::class, 'update']);
    Route::delete('/prodi/{id}', [ProdiController::class, 'destroy']);

    Route::get('/tahunusulan', [TahunUsulanController::class, 'index']);
    Route::get('/tahunusulan/create', [TahunUsulanController::class, 'create']);
    Route::post('/tahunusulan/create', [TahunUsulanController::class, 'store']);
    Route::get('/tahunusulan/{id}/edit', [TahunUsulanController::class, 'edit']);
    Route::get('/tahunusulan/{id}/show', [TahunUsulanController::class, 'show']);
    Route::put('/tahunusulan/{id}', [TahunUsulanController::class, 'update']);
    Route::delete('/tahunusulan/{id}', [TahunUsulanController::class, 'destroy']);

    Route::get('/bobotkriteria', [BobotKriteriaController::class, 'index']);
    Route::get('/bobotkriteria/create', [BobotKriteriaController::class, 'create']);
    Route::post('/bobotkriteria/create', [BobotKriteriaController::class, 'store']);
    Route::get('/bobotkriteria/{id}/edit', [BobotKriteriaController::class, 'edit']);
    Route::get('/bobotkriteria/{id}/show', [BobotKriteriaController::class, 'show']);
    Route::put('/bobotkriteria/{id}', [BobotKriteriaController::class, 'update']);
    Route::delete('/bobotkriteria/{id}', [BobotKriteriaController::class, 'destroy']);

    Route::get('/mahasiswa', [MahasiswaController::class, 'index']);
    Route::get('/mahasiswa/create', [MahasiswaController::class, 'create']);
    Route::post('/mahasiswa/create', [MahasiswaController::class, 'store']);
    Route::get('/mahasiswa/{id}/edit', [MahasiswaController::class, 'edit']);
    Route::get('/mahasiswa/{id}/show', [MahasiswaController::class, 'show']);
    Route::put('/mahasiswa/{id}', [MahasiswaController::class, 'update']);
    Route::delete('/mahasiswa/{id}', [MahasiswaController::class, 'destroy']);

    Route::get('/ipk', [IPKController::class, 'index']);
    Route::get('/ipk/create', [IPKController::class, 'create']);
    Route::post('/ipk/create', [IPKController::class, 'store']);
    Route::get('/ipk/{id}/edit', [IPKController::class, 'edit']);
    Route::get('/ipk/{id}/show', [IPKController::class, 'show']);
    Route::put('/ipk/{id}', [IPKController::class, 'update']);
    Route::delete('/ipk/{id}', [IPKController::class, 'destroy']);

    Route::get('/nilaiprestasi', [NilaiprestasiController::class, 'index']);
    Route::get('/nilaiprestasi/create', [NilaiprestasiController::class, 'create']);
    Route::post('/nilaiprestasi/create', [NilaiprestasiController::class, 'store']);
    Route::get('/nilaiprestasi/{id}/edit', [NilaiprestasiController::class, 'edit']);
    Route::get('/nilaiprestasi/{id}/show', [NilaiprestasiController::class, 'show']);
    Route::put('/nilaiprestasi/{id}', [NilaiprestasiController::class, 'update']);
    Route::delete('/nilaiprestasi/{id}', [NilaiprestasiController::class, 'destroy']);

    Route::get('/rekapanbeasiswa', [RekapanbeasiswaController::class, 'index']);
});
