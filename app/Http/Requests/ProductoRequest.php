<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductoRequest extends FormRequest
{
    public function authorize()
    {
        // Aquí puedes validar si el usuario está autorizado para realizar esta acción
        return true;
    }

    public function rules()
    {
        return [
            'nombre_producto' => 'required|string|max:255',
            'imagen' => 'nullable|string|max:255',
            'id_categoria' => 'required|exists:categorias,id',
        ];
    }

    public function messages()
    {
        return [
            'nombre_producto.required' => 'El campo nombre del producto es obligatorio.',
            'nombre_producto.string' => 'El campo nombre del producto debe ser una cadena de texto.',
            'nombre_producto.max' => 'El campo nombre del producto no puede tener más de 255 caracteres.',
            'imagen.string' => 'El campo imagen debe ser una cadena de texto.',
            'imagen.max' => 'El campo imagen no puede tener más de 255 caracteres.',
            'id_categoria.required' => 'El campo categoría es obligatorio.',
            'id_categoria.exists' => 'La categoría seleccionada no existe.',
        ];
    }
}
