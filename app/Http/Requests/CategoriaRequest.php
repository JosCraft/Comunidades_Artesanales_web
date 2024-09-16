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
        ];
    }
}
