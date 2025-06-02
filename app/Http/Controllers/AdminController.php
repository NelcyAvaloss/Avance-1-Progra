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
   $usuarios = User::where('rol', '!=', 'admin')->get();
    $libros = Libro::with('usuario')->get(); // Asegúrate que Libro tenga relación con User
    $reportes = Reporte::all(); // Solo si tienes un modelo llamado Reporte

    return view('Admin', compact('usuarios', 'libros', 'reportes'));

    $usuarios = User::where('rol', '!=', 'admin')->get();
    return view('Admin', compact('usuarios'));
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
