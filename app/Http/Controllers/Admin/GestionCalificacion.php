<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Calificacion;

use Alert;

class GestionCalificacion extends Controller
{
    public function index()
    {
        $calificaciones = Calificacion::all();
        return view('admin.calificacion.index',['calificaciones'=>$calificaciones]);
    }

    public function delete($id)
    {
        $calificacion = Calificacion::find($id);
        Alert::success('Exito', 'Calificacion eliminada con exito');
        return redirect()->route('admin.calificacion.index');
    }
}
