<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doubts; // 🚨 ¡IMPORTANTE! Importar el modelo 'Doubts'

class DoubtsController extends Controller
{
    /**
     * Muestra la lista de dudas ordenadas por orden de llegada.
     * Corresponde a la ruta 'doubts.index'.
     */
    public function index()
    {
        $doubts = Doubts::orderBy('created_at', 'asc')->get();

        return view('doubts.index', compact('doubts'));
    }
}