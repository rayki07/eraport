<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\UjianController;
use App\Http\Controllers\TahunAjaranController;
use App\Http\Controllers\UjianItemController;
use App\Http\Controllers\NilaiUjianController;
use App\Http\Controllers\NilaiAttController;
use App\Http\Controllers\RaportController;

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
        ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
        ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
        ->name('password.store');
});

Route::middleware('auth')->group(function () {
    Route::get('verify-email', EmailVerificationPromptController::class)
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
});

Route::middleware(['auth', 'role:admin,guru'])->group(function() {

    // menampilkan Data Siswa
    Route::get('/siswa', [SiswaController::class,'index'])->name('siswa.index');
    Route::get('/siswa/create', [SiswaController::class, 'create'])->name('siswa.create');
    Route::post('/siswa', [SiswaController::class, 'store'])->name('siswa.store');

    /* //Import file excel
    Route::get('/siswa/import', [SiswaImportController::class, 'index'])->name('siswa.import.form');
    Route::post('/siswa/import/preview', [SiswaImportController::class, 'preview'])->name('siswa.import.preview');
    Route::post('/siswa/confirm', [SiswaImportController::class, 'confirm'])->name('siswa.import.confirm');
    //Import file excel */

    Route::get('/siswa/{siswa}/edit', [SiswaController::class, 'edit'])->name('siswa.edit');
    Route::patch('/siswa/{siswa}', [SiswaController::class, 'update'])->name('siswa.update');
    Route::delete('/siswa/{siswa}', [SiswaController::class, 'destroy'])->name('siswa.destroy');

    Route::get('/siswa/{siswa}', [SiswaController::class, 'show'])->name('siswa.show');
    Route::post('/siswa/import', [SiswaController::class, 'import'])->name('siswa.import');
    Route::post('/siswa/import/preview', [SiswaController::class, 'import'])->name('siswa.preview');

    // Menampilkan Data Guru
    Route::get('/guru', [GuruController::class,'index'])->name('guru.index');
    Route::get('/guru/create', [GuruController::class, 'create'])->name('guru.create');
    Route::post('/guru', [GuruController::class, 'store'])->name('guru.store');
    Route::get('/guru/{guru}', [GuruController::class, 'show'])->name('guru.show');
    Route::get('/guru/{guru}/edit', [GuruController::class, 'edit'])->name('guru.edit');
    Route::patch('/guru/{guru}', [GuruController::class, 'update'])->name('guru.update');
    Route::delete('/guru/{guru}', [GuruController::class, 'destroy'])->name('guru.destroy');

    //menampilkan detail kelas
    Route::get('/kelas', [KelasController::class,'index'])->name('kelas.index');
    Route::get('/kelas/create', [KelasController::class, 'create'])->name('kelas.create');
    Route::post('/kelas/store', [KelasController::class, 'store'])->name('kelas.store');
    Route::get('/kelas/{kelas}', [KelasController::class,'show'])->name('kelas.show');

    // Halaman siswa berdasarkan kelas
    Route::get('/kelas/{kelas}/siswa', [KelasController::class,'siswa'])->name('kelas.siswa');
    Route::get('/kelas/{kelas}/edit', [KelasController::class, 'edit'])->name('kelas.edit');
    Route::post('/kelas/import', [KelasController::class, 'import'])->name('kelas.import');
    Route::patch('/kelas/{kelas}', [KelasController::class, 'update'])->name('kelas.update');
    Route::get('/kelas/{kelas}/siswa/{siswa}', [SiswaController::class, 'show'])->name('kelas.siswa.show');

    // Menampilkan Mapel
    Route::get('/mapel', [MapelController::class, 'index'])->name('mapel.index');

    // Menampilkan Tahun Ajaran
    Route::get('/tahunajaran', [TahunAjaranController::class, 'index'])->name('tahunajaran.index');
    Route::get('/tahunajaran/create', [TahunAjaranController::class, 'create'])->name('tahunajaran.create');
    Route::post('/tahunajaran', [TahunAjaranController::class, 'store'])->name('tahunajaran.store');
    Route::get('/tahunajaran/{tahunajaran}/edit', [TahunAjaranController::class, 'edit'])->name('tahunajaran.edit');
    Route::patch('/tahunajaran/{tahunajaran}', [TahunAjaranController::class, 'update'])->name('tahunajaran.update');

    // Menampilkan Ujian
    Route::get('/ujian', [UjianController::class, 'index'])->name('ujian.index');
    Route::get('/ujian/create', [UjianController::class, 'create'])->name('ujian.create');
    Route::post('/ujian', [UjianController::class, 'store'])->name('ujian.store');
    Route::get('/ujian/{ujian}/edit', [UjianController::class, 'edit'])->name('ujian.edit');
    Route::patch('/ujian/{ujian}', [UjianController::class, 'update'])->name('ujian.update');

    // Menampilkan Ujian item
    Route::get('/ujian.item', [UjianItemController::class, 'index'])->name('ujian.item.index');
    Route::get('/ujian.item/create', [UjianItemController::class, 'create'])->name('ujian.item.create');
    Route::post('/ujian.item', [UjianItemController::class, 'store'])->name('ujian.item.store');
    Route::get('/ujian.item/{ujian_item}/edit', [UjianItemController::class, 'edit'])->name('ujian.item.edit');
    Route::patch('/ujian.item/{ujian_item}', [UjianItemController::class, 'update'])->name('ujian.item.update');

    // Menampilkan nilai ujian
    Route::get('/nilai-ujian', [NilaiUjianController::class, 'index'])->name('nilai.index');
    Route::get('/nilai-ujian/{siswa}', [NilaiUjianController::class, 'show'])->name('nilai.show');
    Route::post('/nilai-ujian', [NilaiUjianController::class, 'store'])->name('nilai.store');
    Route::get('/nilai-ujian/input', [NilaiUjianController::class, 'input'])->name('nilai.input');

    //menampilkan nilai ujian ATT
    Route::get('/att', [NilaiAttController::class, 'index'])->name('att.index');
    Route::post('/att', [NilaiAttController::class, 'store'])->name('att.store');
    Route::get('/att/input', [NilaiAttController::class, 'input'])->name('att.input');
    Route::get('/att/{id}', [NilaiAttController::class, 'show'])->name('att.show');

    // Menampilkan data raport
    Route::get('/raport', [RaportController::class, 'index'])->name('raport.index');
    Route::post('/raport', [RaportController::class, 'store'])->name('raport.store');
    Route::get('/raport/input', [RaportController::class, 'input'])->name('raport.input');
    Route::get('/tampil/{id}', [RaportController::class, 'tampil'])->name('raport.tampil');
    Route::get('/raport/{id}', [RaportController::class, 'show'])->name('raport.show');
});
