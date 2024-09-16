<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdministradorRequest extends FormRequest
{
    /**
     * Determina si el usuario está autorizado para realizar esta solicitud.
     *
     * @return bool
     */
    public function authorize()
    {
        // Puedes agregar lógica para verificar si el usuario tiene permiso para esta acción
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
            'cod_Adm' => 'required|string|max:255|unique:administradores,cod_Adm,' . $this->route('administrador'),
            'user_id' => 'required|exists:users,id'
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
            'cod_Adm.required' => 'El código del administrador es obligatorio.',
            'cod_Adm.unique'   => 'El código del administrador ya está en uso.',
            'user_id.required' => 'El usuario es obligatorio.',
            'user_id.exists'   => 'El usuario seleccionado no existe en la base de datos.'
        ];
    }
}
