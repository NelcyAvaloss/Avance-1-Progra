<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reporte;

class SoporteController extends Controller
{
    public function mostrarFormulario()
    {
        return view('Soporte');
    }

    public function enviar(Request $request)
    {
        $request->validate([
            'tipo' => 'required|string',
            'mensaje' => 'required|string',
            'correo' => 'nullable|email'
        ]);

        Reporte::create([
            'tipo' => $request->tipo,
            'mensaje' => $request->mensaje,
            'correo' => $request->correo
        ]);

        return back()->with('success', 'Tu reporte fue enviado correctamente.');
    }
}

