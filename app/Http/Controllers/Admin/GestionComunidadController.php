<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comunidades;
use App\Http\Requests\ComunidadesRequest;

class GestionComunidadesController extends Controller
{
    public function index()
    {
        // Obtener todas las comunidades
        $comunidades = Comunidades::all();
        return view('/admin/gestion_comunidad', ['comunidades' => $comunidades]);
    }

    public function create_comunidad()
    {
        // Retornar vista para crear nueva comunidad
        return view('/admin/comunidad/create_comunidad');
    }

    public function store(ComunidadesRequest $request)
    {

            // Crear una nueva comunidad con los datos validados
            $response = app(ComunidadesController::class)->store($request);  // Llamamos al método store del UserController

            if ($response->status === 'success'){
                return redirect()->route('admin.gestion_comunidades')->with('message', 'Comunidad creada correctamente');
            } else {
                return redirect()->route('admin.gestion_comunidades')->with('error', 'Error al crear la comunidad: ' . $response->message);
            }

    }

    public function edit($id)
    {
        // Encontrar la comunidad por su ID
        $comunidad = ComunidadesController::findOrFail($id);
        return view('admin/comunidades/edith_comunidades', ['comunidad' => $comunidad]);
    }

    public function update(ComunidadesRequest $request, $id)
    {
        $response = app(ComunidadesController::class)->update($request, $id);

        if ($response->status === 'success') {
            return redirect()->route('admin.gestion_comunidades')->with('message', 'Comunidad actualizada correctamente');
        } else {
            return redirect()->route('admin.gestion_comunidades')->with('error', 'Error al actualizar la comunidad: ' . $response->message);
        }
    }

    public function destroy($id)
    {
        $response = app(ComunidadesController::class)->destroy($id);

        if ($response->status === 'success') {
            return redirect()->route('admin.gestion_comunidades')->with('message', 'Comunidad eliminada correctamente');
        } else {
            return redirect()->route('admin.gestion_comunidades')->with('error', 'Error al eliminar la comunidad: ' . $response->message);
        }
    }
}
