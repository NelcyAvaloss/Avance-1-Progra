<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Libro;
use App\Models\Reporte;
class AdminController extends Controller
{
    // Muestra el panel solo si es admin
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



    // Eliminar usuario si no es admin
    public function eliminarUsuario($id)
    {
        $usuario = User::findOrFail($id);

        if ($usuario->rol !== 'admin') {
            $usuario->delete();
        }

        return redirect()->route('admin')->with('success', 'Usuario eliminado');
    }

    // Restringir usuario si no es admin
    public function restringirUsuario($id)
    {
        $usuario = User::findOrFail($id);

        if ($usuario->rol !== 'admin') {
            $usuario->estado = 'restringido';
            $usuario->save();
        }

        return redirect()->route('admin')->with('success', 'Usuario restringido');
    }

    // Habilitar usuario si no es admin
    public function habilitarUsuario($id)
    {
        $usuario = User::findOrFail($id);

        if ($usuario->rol !== 'admin') {
            $usuario->estado = 'habilitado';
            $usuario->save();
        }

        return redirect()->route('admin')->with('success', 'Usuario habilitado');
    }

    // Mostrar vista individual del usuario
    public function verUsuario($id)
    {
        $usuario = User::findOrFail($id);
        return view('Admin', compact('usuario'));
    }
}
