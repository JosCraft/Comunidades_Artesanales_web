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
            'texto_corto' => 'nullable|string|max:500',
            'precio' => 'required|numeric|min:0',
            'size' => 'nullable|string|max:100',
            'color' => 'nullable|string|max:100',
            'qty' => 'required|integer|min:0',
            'estado' => 'required|in:0,1',
            'contenido' => 'nullable|string',
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
            'texto_corto.max' => 'El campo texto corto no puede tener más de 500 caracteres.',
            'precio.required' => 'El campo precio es obligatorio.',
            'precio.numeric' => 'El campo precio debe ser un número.',
            'precio.min' => 'El campo precio debe ser mayor o igual a 0.',
            'size.max' => 'El campo tamaño no puede tener más de 100 caracteres.',
            'color.max' => 'El campo color no puede tener más de 100 caracteres.',
            'qty.required' => 'El campo cantidad es obligatorio.',
            'qty.integer' => 'El campo cantidad debe ser un número entero.',
            'qty.min' => 'El campo cantidad debe ser mayor o igual a 0.',
            'estado.required' => 'El campo estado es obligatorio.',
            'estado.in' => 'El campo estado debe ser 0 o 1.',
            'contenido.string' => 'El campo contenido debe ser una cadena de texto.',
        ];
    }
}
