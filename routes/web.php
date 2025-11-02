<?php


use App\Http\Controllers\KelasController;
use Illuminate\Support\Facades\Route;   
use App\Http\Controllers\StudentController;
use App\Http\Controllers\gradesController;
use App\Http\Controllers\TeachersController;
use App\Http\Controllers\LessonsController;
use App\Http\Controllers\SiswaController;

Route::get('/', function () {
    return view('home');
});

Route::get('/welcome', function () {
    return view('welcome');
});

// menampilkan detail siswa
Route::get('/siswa', [SiswaController::class,'index']);

//menampilkan detail kelas
Route::get('/kelas', [KelasController::class,'index']);

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

