<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Promocion;
use Carbon\Carbon;
use Exception;

use App\Http\Controllers\PromocionesController;

class TieneController extends Controller
{
    // Método para agregar una promoción a un producto
    public function agregarPromocion(Request $request)
    {
        try {

            // Buscar el producto
            $producto = Producto::find($request->producto_id);

            // Crear la promoción con los datos del request
            $response = app(PromocionesController::class)->store($request);
            if ($response->status === 'error') {
                return redirect()->back()->with('error', $response->message);
            }
            // Agregar la promoción con las fechas
            $producto->agregarPromocion($response->promocion_id, $request->fecha_inicio, $request->fecha_fin);

            return redirect()->back()->with('success', $response->message);
        } catch (Exception $e) {
            // En caso de error, devuelve un objeto con el mensaje de error
            return back()->with('error', $e->getMessage());
        }
    }

    // Método para eliminar una promoción de un producto
    public function removerPromocion($productoId, $promocionId)
    {
        try {
            // Buscar el producto
            $producto = Producto::findOrFail($productoId);

            // Remover la promoción
            $producto->removerPromocion($promocionId);

            return redirect()->back()->with('success', $response->message);
        } catch (Exception $e) {
            // En caso de error, devuelve un objeto con el mensaje de error
            return back()->with('error', $e->getMessage());
        }
    }

    // Método para eliminar promociones expiradas
    public function eliminarPromocionesExpiradas($productoId)
    {
        try {
            // Buscar el producto
            $producto = Producto::findOrFail($productoId);

            // Verificar y eliminar promociones expiradas
            $producto->verificarPromocionesExpiradas();

            return redirect()->back()->with('success', $response->message);
        } catch (Exception $e) {
            // En caso de error, devuelve un objeto con el mensaje de error
            return back()->with('error', $e->getMessage());
        }
    }
}
