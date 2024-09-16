<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PromocionRequest extends FormRequest
{
    public function authorize()
    {
        // Aquí puedes validar si el usuario está autorizado para realizar esta acción
        return true;
    }

    public function rules()
    {
        return [
            'tipo' => 'required|string|max:50',
            'nombre_promocion' => 'required|string|max:255',
            'descripcion' => 'nullable|string|max:500',
            'descuento' => 'required|numeric|min:0|max:100',
        ];
    }

    public function messages()
    {
        return [
            'tipo.required' => 'El campo tipo es obligatorio.',
            'tipo.string' => 'El campo tipo debe ser una cadena de texto.',
            'tipo.max' => 'El campo tipo no puede tener más de 50 caracteres.',
            'nombre_promocion.required' => 'El campo nombre de la promoción es obligatorio.',
            'nombre_promocion.string' => 'El campo nombre de la promoción debe ser una cadena de texto.',
            'nombre_promocion.max' => 'El campo nombre de la promoción no puede tener más de 255 caracteres.',
            'descripcion.string' => 'El campo descripción debe ser una cadena de texto.',
            'descripcion.max' => 'El campo descripción no puede tener más de 500 caracteres.',
            'descuento.required' => 'El campo descuento es obligatorio.',
            'descuento.numeric' => 'El campo descuento debe ser un número.',
            'descuento.min' => 'El campo descuento debe ser al menos 0.',
            'descuento.max' => 'El campo descuento no puede ser mayor que 100.',
        ];
    }
}
