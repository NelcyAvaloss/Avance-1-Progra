<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Libro;

class LibroController extends Controller
{
    public function index()
    {
        $libros = Libro::where('user_id', auth()->id())->get();
        return view('Mis_libros', compact('libros'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'categoria' => 'required|string',
            'portada' => 'required|image',
            'archivo' => 'required|file',
        ]);

        $portadaPath = $request->file('portada')->store('portadas', 'public');
        $archivoPath = $request->file('archivo')->store('libros', 'public');

        Libro::create([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'categoria' => $request->categoria,
            'imagen' => str_replace('public/', '', $portadaPath),
            'archivo' => str_replace('public/', '', $archivoPath),
            'user_id' => Auth::id(),
            'estado' => 'pendiente'
        ]);

        return back()->with('success', 'Libro subido correctamente.');
    }

    public function destroy($id)
    {
        $libro = Libro::findOrFail($id);

        if ($libro->user_id !== auth()->id()) {
            abort(403);
        }

        if ($libro->imagen) {
            Storage::delete('public/' . $libro->imagen);
        }

        if ($libro->archivo) {
            Storage::delete('public/' . $libro->archivo);
        }

        $libro->delete();

        return redirect()->route('Mis_libros')->with('success', 'Libro eliminado correctamente.');
    }
}
