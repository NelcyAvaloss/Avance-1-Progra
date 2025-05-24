<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;

// Ruta protegida que solo pueden ver usuarios autenticados
Route::get('/home', [HomeController::class, 'index'])
    ->middleware('auth') // Protege la ruta con el middleware de autenticación
    ->name('home');      // Nombre de la ruta para usar en redirect()->route('home')

// Redirección del inicio ('/') hacia la página de login
Route::get('/', function () {
    return redirect()->route('login'); // Redirecciona al formulario de login
});

// Vista del formulario de login
Route::get('/login', function () {
    return view('auth.login'); // Carga la vista login.blade.php
})->name('login');

// Procesa el formulario de registro
Route::post('/register', [AuthController::class, 'register'])
    ->name('register'); // Ruta que usa el método register() en AuthController

// Procesa el formulario de login
Route::post('/login', [AuthController::class, 'login'])
    ->name('login.attempt'); // Ruta que usa el método login() en AuthController
