<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;

Route::get('/home', [HomeController::class, 'index'])->middleware('auth')->name('home');


Route::get('/', function () {
    return redirect()->route('login');
});


Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::post('/login', [AuthController::class, 'login'])->name('login.attempt');


