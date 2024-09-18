<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comunidad;
use App\Http\Requests\ComunidadRequest;
use App\Http\Controllers\ComunidadesController;

class GestionComunidadController extends Controller
{
    public function index()
    {
        // Obtener todas las comunidades
        $comunidades = Comunidad::paginate(10);
        return view('/admin/gestion_comunidad', ['comunidades' => $comunidades])
        ->with('success', session('success'))
            ->with('error', session('error'));
    }

    public function create_comunidad()
    {
        // Retornar vista para crear nueva comunidad
        return view('/admin/comunidad/create_comunidad');
    }

    public function store(ComunidadRequest $request)
    {

            // Crear una nueva comunidad con los datos validados
            $response = app(ComunidadesController::class)->store($request);  // Llamamos al método store del UserController

            if ($response->status === 'success'){
                return redirect()->route('admin.gestion_comunidad')->with('success', 'Comunidad creada correctamente');
            } else {
                return redirect()->back()->with('error', 'Error al crear la comunidad: ' . $response->message);
            }

    }

    public function edit($id)
    {
        // Encontrar la comunidad por su ID
        $comunidad = Comunidad::find($id);
        return view('admin/comunidad/edit_comunidad', ['comunidad' => $comunidad]);
    }

    public function update(ComunidadRequest $request, $id)
    {
        $response = app(ComunidadesController::class)->update($request, $id);

        if ($response->status === 'success') {
            return redirect()->route('admin.gestion_comunidad')->with('success', 'Comunidad actualizada correctamente');
        } else {
            return redirect()->back()->with('error', 'Error al actualizar la comunidad: ' . $response->message);
        }
    }

    public function destroy($id)
    {
        $response = app(ComunidadesController::class)->destroy($id);

        if ($response->status === 'success') {
            return redirect()->route('admin.gestion_comunidad')->with('success', 'Comunidad eliminada correctamente');
        } else {
            return redirect()->back()->with('error', 'Error al eliminar la comunidad: ' . $response->message);
        }
    }
}
