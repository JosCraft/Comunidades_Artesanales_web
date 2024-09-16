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
            'productos.*.id_producto' => 'required|exists:productos,id',
            'productos.*.stock' => 'required|integer|min:1',
            'productos.*.descripcion' => 'nullable|string|max:1000',
            'productos.*.precio' => 'required|numeric|min:0',
            'productos.*.fecha_fabricacion' => 'required|date',
            'notificaciones.*.id_comunario' => 'required|exists:comunarios,id',
        ];
    }

    public function messages()
    {
        return [
            'user_id.required' => 'El ID del usuario es obligatorio.',
            'especialidad.required' => 'La especialidad es obligatoria.',
            'id_comunidad.required' => 'El ID de la comunidad es obligatorio.',
            'productos.*.id_producto.required' => 'El ID del producto es obligatorio.',
            'productos.*.stock.required' => 'El stock del producto es obligatorio.',
            'productos.*.precio.required' => 'El precio del producto es obligatorio.',
            'productos.*.fecha_fabricacion.required' => 'La fecha de fabricación es obligatoria.',
            'notificaciones.*.id_comunario.required' => 'El ID del comunario en la notificación es obligatorio.',
        ];
    }
}
