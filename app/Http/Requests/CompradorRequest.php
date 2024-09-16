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
            'pedidos.*.id_producto' => 'required|exists:productos,id',
            'pedidos.*.lugar_entrega' => 'required|string|max:255',
            'pedidos.*.fecha_pedido' => 'required|date',
            'pedidos.*.cantidad_producto' => 'required|integer|min:1',
            'pedidos.*.tiempo_entrega' => 'required|string|max:100',
            'devoluciones.*.id_producto' => 'required|exists:productos,id',
            'devoluciones.*.cantidad_producto' => 'required|integer|min:1',
            'devoluciones.*.lugar_recogida' => 'required|string|max:255',
            'devoluciones.*.razon' => 'required|string|max:500',
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
            'pedidos.*.id_producto.required' => 'El ID del producto en el pedido es obligatorio.',
            'pedidos.*.id_producto.exists' => 'El ID del producto en el pedido debe existir en la tabla de productos.',
            'pedidos.*.lugar_entrega.required' => 'El lugar de entrega del pedido es obligatorio.',
            'pedidos.*.fecha_pedido.required' => 'La fecha del pedido es obligatoria.',
            'pedidos.*.cantidad_producto.required' => 'La cantidad del producto es obligatoria.',
            'pedidos.*.cantidad_producto.integer' => 'La cantidad del producto debe ser un número entero.',
            'devoluciones.*.id_producto.required' => 'El ID del producto en la devolución es obligatorio.',
            'devoluciones.*.lugar_recogida.required' => 'El lugar de recogida de la devolución es obligatorio.',
            'devoluciones.*.razon.required' => 'La razón de la devolución es obligatoria.',
        ];
    }
}
