<?php


use App\Http\Controllers\KelasController;
use Illuminate\Support\Facades\Route;   
use App\Http\Controllers\StudentController;
use App\Http\Controllers\gradesController;
use App\Http\Controllers\TeachersController;
use App\Http\Controllers\LessonsController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\SiswaImportController;
use App\Http\Controllers\RaportAttController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\UjianController;
use App\Http\Controllers\TahunAjaranController;
use App\Http\Controllers\UjianItemController;
use App\Http\Controllers\NilaiUjianController;
use App\Http\Controllers\NilaiAttController;


Route::get('/', function () {
    return view('home');
});

Route::get('/welcome', function () {
    return view('welcome');
});

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
Route::get('/ujian/create', [UjianController::class, 'create'])->name('ujian.create');
Route::post('/ujian', [UjianController::class, 'store'])->name('ujian.store');
Route::get('/ujian/{ujian}/edit', [UjianController::class, 'edit'])->name('ujian.edit');
Route::patch('/ujian/{ujian}', [UjianController::class, 'update'])->name('ujian.update');

// Menampilkan Ujian item
Route::get('/ujian.item', [UjianItemController::class, 'index'])->name('ujian.item.index');
Route::get('/ujian.item/create', [UjianItemController::class, 'create'])->name('ujian.item.create');
Route::post('/ujian.item', [UjianItemController::class, 'store'])->name('ujian.item.store');
Route::get('/ujian.item/{item}/edit', [UjianItemController::class, 'edit'])->name('ujian.item.edit');
Route::patch('/ujian.item/{item}', [UjianItemController::class, 'update'])->name('ujian.item.update');

// Menampilkan nilai ujian
Route::get('/nilai-ujian', [NilaiUjianController::class, 'index'])->name('nilai.index');
Route::get('/nilai-ujian/{siswa}', [NilaiUjianController::class, 'show'])->name('nilai.show');
Route::post('/nilai-ujian', [NilaiUjianController::class, 'store'])->name('nilai.store');
Route::get('/nilai-ujian/input', [NilaiUjianController::class, 'input'])->name('nilai.input');

//menampilkan nilai ujian ATT
Route::get('/att', [NilaiAttController::class, 'index'])->name('att.index');
Route::get('/att/{id}', [NilaiAttController::class, 'show'])->name('att.show');
Route::post('/att', [NilaiAttController::class, 'store'])->name('att.store');
Route::get('/att/input', [NilaiAttController::class, 'input'])->name('att.input');



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



