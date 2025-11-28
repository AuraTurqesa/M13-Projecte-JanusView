<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactFormRequest; 
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Models\Doubts; // 🚨 ¡IMPORTANTE! Usar el nuevo modelo 'Doubts'

class ContactFormController extends Controller
{
    public function index(): View 
    {
        // Retorna la vista que contiene el formulario.
        return view('contact_form.index'); 
    }

    // Guarda los datos y redirige a la lista de dudas
    public function store(StoreContactFormRequest $request): RedirectResponse
    {
        $validatedData = $request->validated();
        
        // 1. 💾 Lógica para guardar el registro usando el modelo Doubts
        try {
            Doubts::create($validatedData);
        } catch (\Exception $e) {
            // Manejo de errores
            return redirect()->back()->withInput()->with('error', 'Hubo un error al enviar la duda.');
        }
            
        // 2. ➡️ Redirige a la ruta que muestra la lista de dudas (DoubtsController@index)
        return redirect()->route('doubts.index')->with('success', '¡Tu duda ha sido enviada y guardada exitosamente!');
    }
}