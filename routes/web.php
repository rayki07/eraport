<?php


use Illuminate\Support\Facades\Route;   
use App\Http\Controllers\StudentController;
use App\Http\Controllers\gradeController;
use App\Http\Controllers\TeachersController;
use App\Http\Controllers\LessonsController;

Route::get('/', function () {
    return view('home');
});

Route::get('/welcome', function () {
    return view('welcome');
});

//pakai Controller
Route::get('/students', [StudentController::class, 'index']);

//Untuk menampilkan detail grade
Route::get('/grades', [GradeController::class, 'index']);
Route::get('/grades/{grade}', [GradeController::class, 'show']);

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

