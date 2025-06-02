<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PerfilController extends Controller
{
 public function update(Request $request)
{
    $user = auth()->user();

    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:users,email,' . $user->id,
        'universidad' => 'nullable|string|max:255',
        'rol' => 'required|in:lector,autor',
        'password' => 'nullable|confirmed|min:6',
        'tema' => 'required|in:claro,oscuro',
        'idioma' => 'required|string',
        'categorias_favoritas' => 'nullable|string',
        'foto' => 'nullable|image|max:2048',
    ]);

    $user->name = $request->name;
    $user->email = $request->email;
    $user->universidad = $request->universidad;
    $user->rol = $request->rol;
    $user->tema = $request->tema;
    $user->idioma = $request->idioma;
    $user->categorias_favoritas = $request->categorias_favoritas;

    if ($request->filled('password')) {
        $user->password = bcrypt($request->password);
    }

    if ($request->hasFile('foto')) {
    $fotoPath = $request->file('foto')->store('fotos', 'public');
    $user->foto = $fotoPath; // Ya está limpio, no hay que hacer str_replace
}


    $user->save();

    return redirect()->route('perfil_actualizado')->with('success', 'Perfil actualizado correctamente.');
}

public function perfil()
{
    return view('Perfil_actualizado');
}


}
