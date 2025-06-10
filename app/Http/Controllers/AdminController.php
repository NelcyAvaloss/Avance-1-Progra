<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Libro;
use App\Models\Reporte;
class AdminController extends Controller
{
    // Muestra el panel solo al admin
   public function index()
{
    if (auth()->user()->rol !== 'admin') {
        abort(403, 'No tienes permiso para acceder a esta sección.');
    }

    $usuarios = User::where('rol', '!=', 'admin')->get();
    $libros = Libro::with('usuario')->get();
    $reportes = Reporte::all();

    return view('Admin', compact('usuarios', 'libros', 'reportes'));
}



    public function eliminarUsuario($id)
    {
        $usuario = User::findOrFail($id);

        if ($usuario->rol !== 'admin') {
            $usuario->delete();
        }

        return redirect()->route('admin')->with('success', 'Usuario eliminado');
    }

    public function restringirUsuario($id)
    {
        $usuario = User::findOrFail($id);

        if ($usuario->rol !== 'admin') {
            $usuario->estado = 'restringido';
            $usuario->save();
        }

        return redirect()->route('admin')->with('success', 'Usuario restringido');
    }

    public function habilitarUsuario($id)
    {
        $usuario = User::findOrFail($id);

        if ($usuario->rol !== 'admin') {
            $usuario->estado = 'habilitado';
            $usuario->save();
        }

        return redirect()->route('admin')->with('success', 'Usuario habilitado');
    }

    public function verUsuario($id)
    {
        $usuario = User::findOrFail($id);
        return view('Admin', compact('usuario'));
    }
}
