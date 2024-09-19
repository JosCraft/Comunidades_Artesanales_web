<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use Exception;

class ProductosController extends Controller
{
    public function store(Request $request)
    {
        try {
            // Verifica si hay una imagen en el request y conviértela a binario
            if ($request->hasFile('imagen')) {
                $imageFile = $request->file('imagen');
                $imageBinary = file_get_contents($imageFile->getRealPath());
            } else {
                $imageBinary = null; // Si no se proporciona una imagen
            }

            // Crear el producto con los datos del request
            $producto = new Producto();
            $producto->nombre_producto = $request->nombre_producto;
            $producto->imagen = $imageBinary;
            $producto->id_categoria = $request->id_categoria;
            $producto->texto_corto = $request->texto_corto;
            $producto->precio = $request->precio;
            $producto->size = $request->size;
            $producto->color = $request->color;
            $producto->qty = $request->qty;
            $producto->estado = $request->estado;
            $producto->contenido = $request->contenido;
            $producto->save();  // Guarda el producto en la base de datos

            // Retorna la respuesta de éxito con el ID del producto
            return (object) [
                'status' => 'success',
                'message' => 'Producto creado correctamente',
                'producto_id' => $producto->id,
                'producto' => $producto

            ];

        } catch (Exception $e) {
            // En caso de error, devuelve un objeto con el mensaje de error
            return (object) [
                'status' => 'error',
                'message' => $e->getMessage()
            ];
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $producto = Producto::find($id);
            if (!$producto) {
                return response()->json(['message' => 'Producto no encontrado', 'status' => 'error'], 404);
            }

            // Verifica si hay una imagen en el request y conviértela a binario
            if ($request->hasFile('imagen')) {
                $imageFile = $request->file('imagen');
                $imageBinary = file_get_contents($imageFile->getRealPath());
                $producto->imagen = $imageBinary;
            }

            $producto->nombre_producto = $request->nombre_producto;
            $producto->id_categoria = $request->id_categoria;
            $producto->texto_corto = $request->texto_corto;
            $producto->precio = $request->precio;
            $producto->size = $request->size;
            $producto->color = $request->color;
            $producto->qty = $request->qty;
            $producto->estado = $request->estado;
            $producto->contenido = $request->contenido;
            $producto->save();

            return (object) ['status' => 'success',
                             'message' => 'Producto actualizado correctamente',
                             'producto_id' => $producto->id,
                            ];
        } catch (Exception $e) {
            return (object) ['status' => 'error', 'message' => $e->getMessage()];
        }
    }

    public function destroy($id)
    {
        try {
            $producto = Producto::find($id);
            if (!$producto) {
                return response()->json(['message' => 'Producto no encontrado', 'status' => 'error'], 404);
            }

            $producto->delete();

            return (object) ['status' => 'success', 'message' => 'Producto eliminado correctamente'];
        } catch (Exception $e) {
            return (object) ['status' => 'error', 'message' => $e->getMessage()];
        }
    }
}
