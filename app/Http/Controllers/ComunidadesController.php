<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Comunidad;

use Exception;


class ComunidadesController extends Controller
{
    //store update,detroy
    public function store(Request $REQUEST){
        try{
            $comunidades = new Comunidad();
            $comunidades->id = $REQUEST['id'];
            $comunidades->pais = $REQUEST['pais'];
            $comunidades->departamento = $REQUEST['departamento'];
            $comunidades->municipio = $REQUEST['municipio'];
            $comunidades->nombre_comunidad = $REQUEST['nombre_comunidad'];
            $comunidades->save();
            return (object)['status' => 'success', 'message' => 'Comunidad creada correctamente'];
        } catch (Exception $e) {
            return (object)['status' => 'error', 'message' => $e->getMessage()];
        }
    }

    public function update(Request $REQUEST, $id){
        try {
            $comunidades = Comunidad::where('id', $id)->first();

            if (!$comunidades) {
                return response()->json(['message' => 'Comunidad no encontrada', 'status' => 'error'], 404);
            }

            // Actualizando los campos
            $comunidades->pais = $REQUEST['pais'];
            $comunidades->departamento = $REQUEST['departamento'];
            $comunidades->municipio = $REQUEST['municipio'];
            $comunidades->nombre_comunidad = $REQUEST['nombre_comunidad'];

            // Guardando los cambios en la base de datos
            $comunidades->save();

            return (object)['status' => 'success', 'message' => 'Comunidad actualizada correctamente'];
        } catch (Exception $e) {
            return (object)['status' => 'error', 'message' => $e->getMessage()];
        }
    }
    public function destroy($id){
        try {
            $comunidades = Comunidad::where('id', $id)->first();

            if (!$comunidades) {
                return response()->json(['message' => 'Comunidad no encontrada', 'status' => 'error'], 404);
            }
            $comunidades->delete();

            return (object)['status' => 'success', 'message' => 'Comunidad actualizada correctamente'];
        } catch (Exception $e) {
            return (object)['status' => 'error', 'message' => $e->getMessage()];
        }
    }

}
