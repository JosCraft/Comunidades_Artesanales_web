<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DeliveryRequest extends FormRequest
{
    public function authorize()
    {
        // Aquí puedes validar si el usuario está autorizado para realizar esta acción
        return true;
    }

    public function rules()
    {
        return [
            'servicio' => 'required|string|max:255',
            'salario' => 'required|numeric',
            'turno' => 'required|string|max:255',
            'id_comunidad' => 'required|exists:comunidades,id',
            'user_id' => 'required|exists:users,id',
        ];
    }

    public function messages()
    {
        return [
            'servicio.required' => 'El campo servicio es obligatorio.',
            'servicio.string' => 'El campo servicio debe ser una cadena de texto.',
            'servicio.max' => 'El campo servicio no debe exceder los 255 caracteres.',

            'salario.required' => 'El campo salario es obligatorio.',
            'salario.numeric' => 'El campo salario debe ser un valor numérico.',

            'turno.required' => 'El campo turno es obligatorio.',
            'turno.string' => 'El campo turno debe ser una cadena de texto.',
            'turno.max' => 'El campo turno no debe exceder los 255 caracteres.',

            'id_comunidad.required' => 'El campo comunidad es obligatorio.',
            'id_comunidad.exists' => 'La comunidad seleccionada no es válida.',

            'user_id.required' => 'El campo usuario es obligatorio.',
            'user_id.exists' => 'El usuario seleccionado no es válido.',
        ];
    }
}
