<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Promocion; // Asegúrate de importar el modelo Promocion
use Exception; // Para manejar errores

class PromocionesController extends Controller
{
    public function store(Request $request)
    {
        try {
            // Crear la promoción con los datos del request
            $promocion = new Promocion();
            $promocion->tipo = $request->tipo;
            $promocion->nombre_promocion = $request->nombre_promocion;
            $promocion->descripcion = $request->descripcion;
            $promocion->descuento = $request->descuento;
            $promocion->save(); // Guardar la promoción en la base de datos

            // Retornar la respuesta de éxito
            return (object) [
                'status' => 'success',
                'message' => 'Promoción creada correctamente',
                'promocion_id' => $promocion->id
            ];

        } catch (Exception $e) {
            // En caso de error, devolver un objeto con el mensaje de error
            return (object) [
                'status' => 'error',
                'message' => $e->getMessage()
            ];
        }
    }

    public function update(Request $request, $id)
    {
        try {
            // Buscar la promoción por su ID
            $promocion = Promocion::find($id);
            if (!$promocion) {
                return response()->json(['message' => 'Promoción no encontrada', 'status' => 'error'], 404);
            }

            // Actualizar los campos con los datos del request
            $promocion->tipo = $request->tipo;
            $promocion->nombre_promocion = $request->nombre_promocion;
            $promocion->descripcion = $request->descripcion;
            $promocion->descuento = $request->descuento;
            $promocion->save(); // Guardar los cambios

            return (object) [
                'status' => 'success',
                'message' => 'Promoción actualizada correctamente'
            ];

        } catch (Exception $e) {
            // En caso de error
            return (object) [
                'status' => 'error',
                'message' => $e->getMessage()
            ];
        }
    }

    public function destroy($id)
    {
        try {
            // Buscar la promoción por su ID
            $promocion = Promocion::find($id);
            if (!$promocion) {
                return response()->json(['message' => 'Promoción no encontrada', 'status' => 'error'], 404);
            }

            // Eliminar la promoción
            $promocion->delete();

            return (object) [
                'status' => 'success',
                'message' => 'Promoción eliminada correctamente'
            ];

        } catch (Exception $e) {
            // En caso de error
            return (object) [
                'status' => 'error',
                'message' => $e->getMessage()
            ];
        }
    }
}
