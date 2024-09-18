<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\ProductosController;

use App\Models\Comunario;

class HaceController extends Controller
{
    public function addProduct(Request $request, $id)
    {
        try {
            // Busca el comunario por su ID
            $comunario = Comunario::find($id);

            if (!$comunario) {
                return response()->json(['status' => 'error', 'message' => 'Comunario no encontrado'], 404);
            }

            // Crear el producto con los datos del request
            $response = app(ProductosController::class)->store($request);

            // Asociar el producto con el comunario en la tabla pivote 'hace'
            $comunario->productos()->attach($response['producto_id'], [
                'fecha_fabricacion' => $request->fecha_fabricacion,
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Producto agregado correctamente al comunario',
                'producto_id' => $response['producto_id'],
            ]);
        } catch (Exception $e) {
            // En caso de error, devuelve un objeto con el mensaje de error
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
            ]);
        }
    }

    public function removeProduct($comunarioId, $productoId)
    {
        try {
            // Busca el comunario por su ID
            $comunario = Comunario::find($comunarioId);

            if (!$comunario) {
                return response()->json(['status' => 'error', 'message' => 'Comunario no encontrado'], 404);
            }

            $response = app(ProductosController::class)->destroy($productoId);
            if ($response->status === 'error') {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Error al eliminar el producto: ' . $response->message,
                ]);
            }

            // Elimina la relación entre el comunario y el producto
            $comunario->productos()->detach($productoId);

            return response()->json([
                'status' => 'success',
                'message' => 'Producto eliminado correctamente del comunario',
            ]);
        } catch (Exception $e) {
            // En caso de error, devuelve un objeto con el mensaje de error
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
            ]);
        }
    }
}
