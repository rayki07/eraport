<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/student', function () {
    return view('student');
});

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/home', function () {
    return view('home');
});