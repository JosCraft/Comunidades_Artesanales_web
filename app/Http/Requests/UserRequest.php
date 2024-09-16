<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function authorize()
    {
        // Aquí puedes validar si el usuario está autorizado para realizar esta acción
        return true;
    }

    public function rules()
    {
        $userId = $this->route('user'); // Obtener el ID del usuario si está en la ruta (para actualizaciones)

        return [
            'nombre' => 'required|string|max:255',
            'apePaterno' => 'required|string|max:255',
            'apeMaterno' => 'nullable|string|max:255',
            'genero' => 'required|in:M,F',
            'celular' => 'required|string|max:20',
            'email' => 'required|email|unique:users,email,' . $userId,
            'password' => 'required|string|min:8|confirmed',
            'fechaNac' => 'required|date',
            'foto' => 'nullable|image|max:2048',
            'codeValidacion' => 'nullable|string|max:255',
            'cantIntentos' => 'nullable|integer|min:0',
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'El campo nombre es obligatorio.',
            'nombre.string' => 'El campo nombre debe ser una cadena de texto.',
            'nombre.max' => 'El campo nombre no puede tener más de 255 caracteres.',
            'apePaterno.required' => 'El campo apellido paterno es obligatorio.',
            'apePaterno.string' => 'El campo apellido paterno debe ser una cadena de texto.',
            'apePaterno.max' => 'El campo apellido paterno no puede tener más de 255 caracteres.',
            'apeMaterno.string' => 'El campo apellido materno debe ser una cadena de texto.',
            'apeMaterno.max' => 'El campo apellido materno no puede tener más de 255 caracteres.',
            'genero.required' => 'El campo género es obligatorio.',
            'genero.in' => 'El campo género debe ser uno de los siguientes: Masculino, Femenino, Otras.',
            'celular.required' => 'El campo celular es obligatorio.',
            'celular.string' => 'El campo celular debe ser una cadena de texto.',
            'celular.max' => 'El campo celular no puede tener más de 20 caracteres.',
            'email.required' => 'El campo email es obligatorio.',
            'email.email' => 'El campo email debe ser una dirección de correo electrónico válida.',
            'email.unique' => 'El campo email ya ha sido tomado.',
            'password.required' => 'El campo password es obligatorio.',
            'password.string' => 'El campo password debe ser una cadena de texto.',
            'password.min' => 'El campo password debe tener al menos 8 caracteres.',
            'password.confirmed' => 'La confirmación del campo password no coincide.',
            'fechaNac.required' => 'El campo fecha de nacimiento es obligatorio.',
            'fechaNac.date' => 'El campo fecha de nacimiento debe ser una fecha válida.',
            'foto.image' => 'El campo foto debe ser una imagen.',
            'foto.max' => 'El campo foto no puede tener más de 2048 kilobytes.',
            'codeValidacion.string' => 'El campo código de validación debe ser una cadena de texto.',
            'codeValidacion.max' => 'El campo código de validación no puede tener más de 255 caracteres.',
            'cantIntentos.integer' => 'El campo cantidad de intentos debe ser un número entero.',
            'cantIntentos.min' => 'El campo cantidad de intentos no puede ser menor que 0.',
        ];
    }

}
