<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comunario;
use App\Http\Requests\ComunidadRequest;
use App\Http\Controllers\ComunidadesController;

class GestionComunarioController extends Controller
{
    public function index()
    {
        // Obtener todas las comunidades
        $comunarios = Comunario::paginate(10);
        return view('/admin/gestion_comunario', ['comunarios' => $comunarios])
        ->with('success', session('success'))
            ->with('error', session('error'));
    }

    public function edit($id){
        $comunario = Comunario::find($id);
        if (!$comunario) {
            return redirect()->route('admin.gestion_comunario')->with('error', 'Comunario no encontrado');
        }
        return view('/admin/comunario/edit_comunario', ['comunario' => $comunario]);
    }

}
