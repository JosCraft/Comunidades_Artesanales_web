<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PedidoRequest extends FormRequest
{
    public function authorize()
    {
        // Aquí puedes validar si el usuario está autorizado para realizar esta acción
        return true;
    }

    public function rules()
    {
        return [
            'estado' => 'required|string|max:255',
        ];
    }

    public function messages()
    {
        return [
            'estado.required' => 'El campo estado es obligatorio.',
            'estado.string' => 'El campo estado debe ser una cadena de texto.',
            'estado.max' => 'El campo estado no puede tener más de 255 caracteres.',
        ];
    }
}
