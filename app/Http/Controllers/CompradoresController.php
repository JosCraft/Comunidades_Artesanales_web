<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comprador;

class CompradoresController extends Controller
{
    public function store( $user_id ) {
        try{
            $comprador = new Comprador();
            $comprador->user_id = $user_id;
            $comprador->save();
            return (object) ['status' => 'success', 'message' => 'Comprador creado correctamente'];
        } catch (Exception $e) {
            return (object) ['status' => 'error', 'message' => $e->getMessage()];
        }

    }

    public function update( CompradorRequest $request, $id ) {
        try {
            $comprador = Comprador::where('user_id', $id)->first();
            if (!$comprador) {
                return response()->json(['message' => 'Comprador no encontrado', 'status' => 'error'], 404);
            }

            $comprador->user_id = request('user_id');
            $comprador->save();

            return (object) ['status' => 'success', 'message' => 'Comprador actualizado correctamente'];
        } catch (Exception $e) {
            return (object) ['status' => 'error', 'message' => $e->getMessage()];
        }
    }

    public function destroy($id) {
        try {
            $comprador = Comprador::where('user_id', $id)->first();
            if (!$comprador) {
                return response()->json(['message' => 'Comprador no encontrado', 'status' => 'error'], 404);
            }

            $comprador->delete();

            return (object) ['status' => 'success', 'message' => 'Comprador eliminado correctamente'];
        } catch (Exception $e) {
            return (object) ['status' => 'error', 'message' => $e->getMessage()];
        }
    }

}
