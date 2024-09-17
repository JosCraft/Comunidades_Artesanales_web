<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ComunarioRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'user_id' => 'required|exists:users,id',
            'especialidad' => 'required|string|max:255',
            'id_comunidad' => 'required|exists:comunidades,id',
        ];
    }

    public function messages()
    {
        return [
            'user_id.required' => 'El ID del usuario es obligatorio.',
            'especialidad.required' => 'La especialidad es obligatoria.',
            'id_comunidad.required' => 'El ID de la comunidad es obligatorio.',
       ];
    }
}
