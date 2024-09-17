<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Administrador;
use App\Http\Requests\AdministradorRequest;

class AdministradoresController extends Controller
{


    public function store(AdministradorRequest $request)
    {
        try{
            $administrador = new Administrador();
            $administrador->user_id = $request['user_id'];
            $administrador->cod_Adm = $request['cod_Adm'];
            $administrador->save();
            return (object) ['status' => 'success', 'message' => 'Administrador creado correctamente'];
        } catch (Exception $e) {
            return (object) ['status' => 'error', 'message' => $e->getMessage()];
        }
    }

    public function update(AdministradorRequest $request, $id)
    {
        try {
            $administrador = Administrador::where('user_id',$id)->first();
            if (!$administrador) {
                return response()->json(['message' => 'Administrador no encontrado', 'status' => 'error'], 404);
            }

            $administrador->user_id = $request['user_id'];
            $administrador->cod_Adm = $request['cod_Adm'];
            $administrador->save();

            return (object) ['status' => 'success', 'message' => 'Administrador actualizado correctamente'];
        } catch (Exception $e) {
            return (object) ['status' => 'error', 'message' => $e->getMessage()];
        }
    }

    public function destroy($id)
    {
        try {
            $administrador = Administrador::where('user_id',$id)->first();
            if (!$administrador) {
                return response()->json(['message' => 'Administrador no encontrado', 'status' => 'error'], 404);
            }

            $administrador->delete();

            return (object) ['status' => 'success', 'message' => 'Administrador eliminado correctamente'];
        } catch (Exception $e) {
            return (object) ['status' => 'error', 'message' => $e->getMessage()];
        }
    }

}
