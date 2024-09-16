<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RolRequest extends FormRequest
{
    public function authorize()
    {
        // Aquí puedes validar si el usuario está autorizado para realizar esta acción
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'slug' => 'required|string|alpha_dash|unique:roles,slug,' . $this->route('role'),
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El campo nombre es obligatorio.',
            'name.string' => 'El campo nombre debe ser una cadena de texto.',
            'name.max' => 'El campo nombre no puede tener más de 255 caracteres.',
            'slug.required' => 'El campo slug es obligatorio.',
            'slug.string' => 'El campo slug debe ser una cadena de texto.',
            'slug.alpha_dash' => 'El campo slug solo puede contener letras, números, guiones y guiones bajos.',
            'slug.unique' => 'El campo slug ya ha sido tomado.',
        ];
    }
}
