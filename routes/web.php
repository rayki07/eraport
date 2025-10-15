<?php

use App\Http\Controllers\gradeController;
use Illuminate\Support\Facades\Route;   
use App\Http\Controllers\StudentController;

Route::get('/', function () {
    return view('home');
});

Route::get('/welcome', function () {
    return view('welcome');
});

//pakai Controller
Route::get('/students', [StudentController::class, 'index']);
Route::get('/grades', [GradeController::class, 'index']);


Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/home', function () {
    return view('home');
});