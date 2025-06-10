<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\History;
use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller
{
    public function index()
    {
        $historial = History::with('libro')
            ->where('usuario_id', Auth::id())
            ->orderByDesc('fecha_lectura')
            ->get();

        return view('Historial', compact('historial'));
    }
}

