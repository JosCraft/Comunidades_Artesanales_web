<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRolRequest extends FormRequest
{
    public function authorize()
    {
        // Aquí puedes validar si el usuario está autorizado para realizar esta acción
        return true;
    }

    public function rules()
    {
        $userRolId = $this->route('user_rol'); // Obtener el ID de UserRol si está en la ruta (para actualizaciones)

        return [
            'role_id' => 'required|exists:roles,id',
            'user_id' => 'required|exists:users,id',
        ];
    }

    public function messages()
    {
        return [
            'role_id.required' => 'El campo role_id es obligatorio.',
            'role_id.exists' => 'El role_id seleccionado no existe en la tabla roles.',
            'user_id.required' => 'El campo user_id es obligatorio.',
            'user_id.exists' => 'El user_id seleccionado no existe en la tabla users.',
        ];
    }
}
