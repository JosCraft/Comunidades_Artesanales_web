<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comunario;
use App\Http\Requests\ComunarioRequest;

class ComunariosController extends Controller
{
    public function store( ComunarioRequest $request ){
        try{
            $comunario = new Comunario();
            $comunario->user_id = $request['user_id'];
            $comunario->especialidad = $request['especialidad'];
            $comunario->id_comunidad = $request['id_comunidad'];
            $comunario->save();
            return (object) ['status' => 'success', 'message' => 'Comunario creado correctamente'];
        } catch (Exception $e) {
            return (object) ['status' => 'error', 'message' => $e->getMessage()];
        }
    }

    public function update( ComunarioRequest $request, $id ){
        try {
            $comunario = Comunario::where('user_id', $id)->first();
            if (!$comunario) {
                return response()->json(['message' => 'Comunario no encontrado', 'status' => 'error'], 404);
            }

            $comunario->user_id = $request['user_id'];
            $comunario->especialidad = $request['especialidad'];
            $comunario->save();

            return (object) ['status' => 'success', 'message' => 'Comunario actualizado correctamente'];
        } catch (Exception $e) {
            return (object) ['status' => 'error', 'message' => $e->getMessage()];
        }
    }

    public function destroy($id){
        try {
            $comunario = Comunario::where('user_id', $id)->first();
            if (!$comunario) {
                return response()->json(['message' => 'Comunario no encontrado', 'status' => 'error'], 404);
            }

            $comunario->delete();

            return (object) ['status' => 'success', 'message' => 'Comunario eliminado correctamente'];
        } catch (Exception $e) {
            return (object) ['status' => 'error', 'message' => $e->getMessage()];
        }
    }

}
