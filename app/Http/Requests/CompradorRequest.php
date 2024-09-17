<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompradorRequest extends FormRequest
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
            'user_id' => 'required|exists:users,id',

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
            'user_id.required' => 'El ID del usuario es obligatorio.',
            'user_id.exists' => 'El ID del usuario debe existir en la tabla de usuarios.',
      ];
    }
}
