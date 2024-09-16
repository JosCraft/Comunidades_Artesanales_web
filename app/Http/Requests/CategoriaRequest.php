<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoriaRequest extends FormRequest
{
    /**
     * Determina si el usuario está autorizado para realizar esta solicitud.
     *
     * @return bool
     */
    public function authorize()
    {
        // Lógica para determinar si el usuario está autorizado
        return true;
    }

    /**
     * Obtiene las reglas de validación que se aplicarán a la solicitud.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nombre' => 'required|string|max:255|unique:categorias,nombre,' . $this->route('categoria'),
            'descripcion' => 'nullable|string|max:1000',
            'slug' => 'required|string|max:255|unique:categorias,slug,' . $this->route('categoria'),
            'categoria_padre' => 'nullable|integer|exists:categorias,id',
            'estado' => 'required|in:0,1',
        ];
    }

    /**
     * Mensajes personalizados para las reglas de validación.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'nombre.required' => 'El nombre de la categoría es obligatorio.',
            'nombre.unique'   => 'El nombre de la categoría ya existe.',
            'nombre.max'      => 'El nombre de la categoría no debe exceder los 255 caracteres.',
            'descripcion.max' => 'La descripción no debe exceder los 1000 caracteres.',
            'slug.required'   => 'El slug es obligatorio.',
            'slug.unique'     => 'El slug ya existe.',
            'slug.max'        => 'El slug no debe exceder los 255 caracteres.',
            'categoria_padre.integer' => 'El campo de categoría padre debe ser un número entero.',
            'categoria_padre.exists'  => 'La categoría padre debe existir en la tabla de categorías.',
            'estado.required' => 'El estado es obligatorio.',
            'estado.in'       => 'El estado debe ser 0 o 1.',
        ];
    }
}
