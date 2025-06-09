<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Libro;

class HomeController extends Controller
{
    public function index()
    {
        // Obtenemos todos los libros y los agrupamos por categoría
        $libros = Libro::all()->groupBy('categoria');

        // Enviamos la variable $libros a la vista
        return view('home', compact('libros'));
    }
}
