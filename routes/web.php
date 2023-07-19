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
use App\Http\Controllers\NilaiPrestasiController;
use App\Http\Controllers\RekapanBeasiswaController;
use App\Http\Controllers\BerkasMahasiswaController;

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
    Route::get('/dashboard', [Dashboard::class, 'index']);

    Route::get('edit-profile', [UserController::class, 'editProfile']);
    Route::put('update-profile', [UserController::class, 'updateProfile']);
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('/berkasmahasiswa', [BerkasMahasiswaController::class, 'index']);
    Route::get('/berkasmahasiswa/create', [BerkasMahasiswaController::class, 'create']);
    Route::post('/berkasmahasiswa/create', [BerkasMahasiswaController::class, 'store']);
    Route::get('/berkasmahasiswa/{nim}/show', [BerkasMahasiswaController::class, 'show']);
    Route::get('/berkasmahasiswa/{nim}/edit', [BerkasMahasiswaController::class, 'edit']);
    Route::put('/berkasmahasiswa/{nim}', [BerkasMahasiswaController::class, 'update']);
});

// Route::middleware(['auth', 'role:admin'])->group(function () {
Route::middleware(['auth'])->group(function () {

    Route::get('/user', [UserController::class, 'index']);
    Route::get('/user/create', [UserController::class, 'create']);
    Route::post('/user/create', [UserController::class, 'store']);
    Route::get('/user/{id}/edit', [UserController::class, 'edit']);
    Route::get('/user/{id}/show', [UserController::class, 'show']);
    Route::put('/user/{id}', [UserController::class, 'update']);
    Route::delete('/user/{id}', [UserController::class, 'destroy']);

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
    Route::get('/mahasiswa/{nim}/edit', [MahasiswaController::class, 'edit']);
    Route::get('/mahasiswa/{nim}/show', [MahasiswaController::class, 'show']);
    Route::put('/mahasiswa/{nim}', [MahasiswaController::class, 'update']);
    Route::delete('/mahasiswa/{nim}', [MahasiswaController::class, 'destroy']);

    Route::get('/ipk', [IPKController::class, 'index']);
    Route::get('/ipk/create', [IPKController::class, 'create']);
    Route::post('/ipk/create', [IPKController::class, 'store']);
    Route::get('/ipk/{nim}/edit', [IPKController::class, 'edit']);
    Route::get('/ipk/{nim}/show', [IPKController::class, 'show']);
    Route::put('/ipk/{nim}', [IPKController::class, 'update']);
    Route::delete('/ipk/{nim}', [IPKController::class, 'destroy']);

    Route::get('/nilaiprestasi', [NilaiPrestasiController::class, 'index']);
    Route::get('/nilaiprestasi/create', [NilaiPrestasiController::class, 'create']);
    Route::post('/nilaiprestasi/create', [NilaiPrestasiController::class, 'store']);
    Route::get('/nilaiprestasi/{nim}/edit', [NilaiPrestasiController::class, 'edit']);
    Route::get('/nilaiprestasi/{nim}/show', [NilaiPrestasiController::class, 'show']);
    Route::put('/nilaiprestasi/{nim}', [NilaiPrestasiController::class, 'update']);
    Route::delete('/nilaiprestasi/{nim}', [NilaiPrestasiController::class, 'destroy']);

    Route::get('/rekapanbeasiswa', [RekapanBeasiswaController::class, 'index']);
    Route::post('/rekapanbeasiswa/sinkron', [RekapanBeasiswaController::class, 'rekap_sinkron']);
    Route::get('/rekapanbeasiswa/export', [RekapanBeasiswaController::class, 'export'])->name('rekap.export');
});
