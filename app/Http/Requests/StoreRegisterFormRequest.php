<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRegisterFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; 
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            // Reglas de validación para cada campo del formulario
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'birth_date' => ['required', 'date', 'before_or_equal:today'],
            'nickname' => ['required', 'string', 'max:16', 'unique:users,nickname']
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'El nombre es obligatorio.',
            'surname.required' => 'El apellido es obligatorio.',
            
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'Por favor, introduce un formato de correo electrónico válido.',
            'email.unique' => 'Este correo electrónico ya está registrado.',
            
            'birth_date.required' => 'La fecha de nacimiento es obligatoria.',
            'birth_date.date' => 'La fecha de nacimiento debe ser una fecha válida.',
            'birth_date.before_or_equal' => 'La fecha de nacimiento no puede ser una fecha futura.',

            'nickname.required' => 'El nickname es obligatorio.',
            'nickname.unique' => 'Este nickname ya está registrado.',
        ];
    }
}