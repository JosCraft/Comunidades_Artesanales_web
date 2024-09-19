<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductoRequest;

use App\Http\Controllers\ProductosController;

use Exception;

use App\Models\Comunario;
use App\Models\Producto;


class HaceController extends Controller
{
    public function addProduct(ProductoRequest $request, $id)
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
            $comunario->addProduct($response->producto, $request->fecha_fabricacion);

            return redirect()->back()->with('success', $response->message);
        } catch (Exception $e) {
            // En caso de error, devuelve un objeto con el mensaje de error
            return back()->with('error', $e->getMessage());
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

            // Elimina la relación entre el comunario y el producto
            $comunario->productos()->detach($productoId);


            $response = app(ProductosController::class)->destroy($productoId);
            if ($response->status === 'error') {
                return redirect()->back()->with('error', $response->message);
            }

            return redirect()->back()->with('success', 'Producto eliminado correctamente');



        } catch (Exception $e) {
            // En caso de error, devuelve un objeto con el mensaje de error
            return back()->with('error', $e->getMessage());
        }
    }
}
