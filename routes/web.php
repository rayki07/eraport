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
use App\Http\Controllers\MapelController;
use App\Http\Controllers\UjianController;
use App\Http\Controllers\TahunAjaranController;

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

Route::get('/siswa/{siswa}/edit', [SiswaController::class, 'edit'])->name('siswa.edit');
Route::post('/siswa/{siswa}', [SiswaController::class, 'update'])->name('siswa.update');
Route::delete('/siswa/{siswa}', [SiswaController::class, 'destroy'])->name('siswa.destroy');

Route::get('/siswa/{siswa}', [SiswaController::class, 'show'])->name('siswa.show');
Route::post('/siswa/import', [SiswaController::class, 'import'])->name('siswa.import');
Route::post('/siswa/import/preview', [SiswaController::class, 'import'])->name('siswa.preview');

//update data satu siswa
/* Route::patch('/siswa') */

// Mata pelajaran ATT
Route::get('/nilai/att/{siswa}', [RaportAttController::class, 'inputNilaiATT'])->name('nilai.input_att');
Route::post('/nilai/att/{siswa}', [RaportAttController::class, 'storeNilaiATT'])->name('nilai.store_att');


//menampilkan detail kelas
Route::get('/kelas', [KelasController::class,'index'])->name('kelas.index');
Route::get('/kelas/create', [KelasController::class, 'create'])->name('kelas.create');
Route::post('/kelas/store', [KelasController::class, 'store'])->name('kelas.store');
Route::get('/kelas/{kelas}', [KelasController::class,'show'])->name('kelas.show');
// Halaman siswa berdasarkan kelas
Route::get('/kelas/{id}/siswa', [KelasController::class,'siswa'])->name('kelas.siswa');
Route::get('/kelas/{kelas}/edit', [KelasController::class, 'edit'])->name('kelas.edit');
Route::post('/kelas/import', [KelasController::class, 'import'])->name('kelas.import');
Route::patch('/kelas/{kelas}', [KelasController::class, 'update'])->name('kelas.update');

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

