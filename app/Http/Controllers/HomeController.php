<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    // Método que retorna la vista principal del usuario (home)
    public function index()
    {
        return view('home'); // Devuelve la vista ubicada en resources/views/home.blade.php
    }
}
