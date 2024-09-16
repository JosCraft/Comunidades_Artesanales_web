<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DetallePedidoRequest extends FormRequest
{
    public function authorize()
    {
        // Aquí puedes validar si el usuario está autorizado para realizar esta acción
        return true;
    }

    public function rules()
    {
        return [
            'id_pedido' => 'required|exists:pedidos,id',
            // Agrega aquí otras reglas de validación si es necesario
        ];
    }

    public function messages()
    {
        return [
            'id_pedido.required' => 'El campo id_pedido es obligatorio.',
            'id_pedido.exists' => 'El id_pedido seleccionado no es válido.',
            // Agrega aquí otros mensajes de error si es necesario
        ];
    }
}
