<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ComunidadRequest extends FormRequest
{
    public function authorize()
    {
        // Aquí puedes validar si el usuario está autorizado para realizar esta acción
        return true;
    }

    public function rules()
    {
        return [
            'pais' => 'required|string|max:255',
            'departamento' => 'required|string|max:255',
            'municipio' => 'required|string|max:255',
            'nombre_comunidad' => 'required|string|max:255',
        ];
    }

    public function messages()
    {
        return [
            'pais.required' => 'El campo país es obligatorio.',
            'pais.string' => 'El campo país debe ser una cadena de texto.',
            'pais.max' => 'El campo país no debe exceder los 255 caracteres.',

            'departamento.required' => 'El campo departamento es obligatorio.',
            'departamento.string' => 'El campo departamento debe ser una cadena de texto.',
            'departamento.max' => 'El campo departamento no debe exceder los 255 caracteres.',

            'municipio.required' => 'El campo municipio es obligatorio.',
            'municipio.string' => 'El campo municipio debe ser una cadena de texto.',
            'municipio.max' => 'El campo municipio no debe exceder los 255 caracteres.',

            'nombre_comunidad.required' => 'El campo nombre de la comunidad es obligatorio.',
            'nombre_comunidad.string' => 'El campo nombre de la comunidad debe ser una cadena de texto.',
            'nombre_comunidad.max' => 'El campo nombre de la comunidad no debe exceder los 255 caracteres.',
        ];
    }
}
