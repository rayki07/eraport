<?php


use App\Http\Controllers\KelasController;
use Illuminate\Support\Facades\Route;   
use App\Http\Controllers\StudentController;
use App\Http\Controllers\gradesController;
use App\Http\Controllers\TeachersController;
use App\Http\Controllers\LessonsController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\SiswaImportController;
use App\Http\Controllers\RaportAttController;

Route::get('/', function () {
    return view('home');
});

Route::get('/welcome', function () {
    return view('welcome');
});

// menampilkan detail siswa
Route::get('/siswa', [SiswaController::class,'index'])->name('siswa.index');
Route::get('/siswa/create', [SiswaController::class, 'create'])->name('siswa.create');
Route::post('/siswa', [SiswaController::class, 'store'])->name('siswa.store');

/* //Import file excel
Route::get('/siswa/import', [SiswaImportController::class, 'index'])->name('siswa.import.form');
Route::post('/siswa/import/preview', [SiswaImportController::class, 'preview'])->name('siswa.import.preview');
Route::post('/siswa/confirm', [SiswaImportController::class, 'confirm'])->name('siswa.import.confirm');
//Import file excel */

Route::get('/siswa/{siswa}/edit', [SiswaController::class, 'edit']);
Route::put('/siswa/{siswa}', [SiswaController::class, 'update']);
Route::delete('/siswa/{siswa}', [SiswaController::class, 'destroy']);

Route::get('/siswa/{siswa}', [SiswaController::class, 'show']);
Route::post('/siswa/import', [SiswaController::class, 'import'])->name('siswa.import');
Route::post('/siswa/import/preview', [SiswaController::class, 'import'])->name('siswa.preview');

// Mata pelajaran ATT
Route::get('/nilai/att/{siswa}', [RaportAttController::class, 'inputNilaiATT'])->name('nilai.input_att');
Route::post('/nilai/att/{siswa}', [RaportAttController::class, 'storeNilaiATT'])->name('nilai.store_att');


//menampilkan detail kelas
Route::get('/kelas', [KelasController::class,'index']);
Route::get('/kelas/{kelas}', [KelasController::class,'show']);
// Halaman siswa berdasarkan kelas
Route::get('/kelas/{id}/siswa', [KelasController::class,'siswa'])->name('kelas.siswa');
Route::post('/kelas/store', [KelasController::class, 'store'])->name('kelas.store');
Route::post('/kelas/import', [KelasController::class, 'import'])->name('kelas.import');


//pakai Controller
Route::get('/students', [StudentController::class, 'index']);

//Untuk menampilkan detail grade
Route::get('/grades', [GradesController::class, 'index']);
Route::get('/grades/{grade}', [GradesController::class, 'show']);

//Untuk menampilkan detail teacher
Route::get('/teachers', [TeachersController::class,'index']);

//Untuk menampilkan matapelajaran
Route::get('/lessons', [LessonsController::class,'index']);


Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/home', function () {
    return view('home');
});

