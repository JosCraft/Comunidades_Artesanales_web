<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NotificacionRequest extends FormRequest
{
    public function authorize()
    {
        // Aquí puedes validar si el usuario está autorizado para realizar esta acción
        return true;
    }

    public function rules()
    {
        return [
            'tipo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'id_comunario' => 'required|exists:comunarios,id',
        ];
    }

    public function messages()
    {
        return [
            'tipo.required' => 'El campo tipo es obligatorio.',
            'tipo.string' => 'El campo tipo debe ser una cadena de texto.',
            'tipo.max' => 'El campo tipo no puede tener más de 255 caracteres.',
            'descripcion.required' => 'El campo descripción es obligatorio.',
            'descripcion.string' => 'El campo descripción debe ser una cadena de texto.',
            'id_comunario.required' => 'El campo id_comunario es obligatorio.',
            'id_comunario.exists' => 'El id_comunario seleccionado no es válido.',
        ];
    }
}
