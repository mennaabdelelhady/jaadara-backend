<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth:sanctum');

Route::get('/login', function () {
    return view('Dashboard');
})->name('login');