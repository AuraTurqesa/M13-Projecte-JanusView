<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRegisterFormRequest; 
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Models\User;

class RegisterFormController extends Controller
{
    public function index(): View 
    {
        return view('register_form.index');
    }
    
    public function store(StoreRegisterFormRequest $request): RedirectResponse
    {
        $validatedData = $request->validated();
                
        $userData = [
            'name' => $validatedData['name'],
            'surname' => $validatedData['surname'],
            'email' => $validatedData['email'],
            'birthdate' => $validatedData['birth_date'],
            'nickname' => $validatedData['nickname']
        ];

        $user = User::create($userData);
            
        // Opcional: Autenticar al usuario inmediatamente después del registro
        // auth()->login($user); 
        
        return redirect()->route('register_form.index')->with('success', '¡Registro exitoso! ¡El formulario ha sido enviado y el usuario creado!');
    }
}