<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Delivery;
use App\Http\Requests\DeliveryRequest;
use Exception;

class DeliveriesController extends Controller
{
    public function store(DeliveryRequest $request)
    {
        try {
            // Create a new Delivery instance and fill it with data from the request
            $delivery = new Delivery();
            $delivery->user_id = $request->user_id;
            $delivery->servicio = $request->servicio;
            $delivery->salario = $request->salario;
            $delivery->turno = $request->turno;
            $delivery->id_comunidad = $request->id_comunidad;
            $delivery->save();

            // Return a standard PHP object
            return (object) [
                'status' => 'success',
                'message' => 'Delivery creado correctamente'
            ];
        } catch (Exception $e) {
            return (object) [
                'status' => 'error',
                'message' => $e->getMessage()
            ];
        }
    }

    public function update(Request $request, $id)
    {
        try {
            // Find the Delivery instance by user_id
            $delivery = Delivery::where('user_id', $id)->first();
            if (!$delivery) {
                return (object) [
                    'status' => 'error',
                    'message' => 'Delivery no encontrado'
                ];
            }

            // Update the Delivery instance with data from the request
            $delivery->servicio = $request->servicio;
            $delivery->salario = $request->salario;
            $delivery->turno = $request->turno;
            $delivery->id_comunidad = $request->id_comunidad;
            $delivery->save();

            return (object) [
                'status' => 'success',
                'message' => 'Delivery actualizado correctamente'
            ];
        } catch (Exception $e) {
            return (object) [
                'status' => 'error',
                'message' => $e->getMessage()
            ];
        }
    }

    public function destroy($id)
    {
        try {
            // Find the Delivery instance by user_id
            $delivery = Delivery::where('user_id', $id)->first();
            if (!$delivery) {
                return (object) [
                    'status' => 'error',
                    'message' => 'Delivery no encontrado'
                ];
            }

            // Delete the Delivery instance
            $delivery->delete();

            return (object) [
                'status' => 'success',
                'message' => 'Delivery eliminado correctamente'
            ];
        } catch (Exception $e) {
            return (object) [
                'status' => 'error',
                'message' => $e->getMessage()
            ];
        }
    }
}
