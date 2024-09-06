<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Comunidad;

use Alert;

class GestionComunidad extends Controller
{
    public function index()
    {
        $comunidades = Comunidad::all();
        return view('admin.comunidad.index', compact('comunidades'));
    }

    public function create()
    {
        return view('admin.comunidad.create');
    }

    public function store(Request $request)
    {
        $comunidad = new Comunidad();
        $comunidad->nombre = $request->nombre;
        $comunidad->save();
        Alert::success('Comunidad creada con éxito');
        return redirect()->route('admin.comunidad.index');
    }

    public function edit($id)
    {
        $comunidad = Comunidad::find($id);
        return view('admin.comunidad.edit', compact('comunidad'));
    }

    public function update(Request $request, $id)
    {
        $comunidad = Comunidad::find($id);
        $comunidad->nombre = $request->nombre;
        $comunidad->save();
        Alert::success('Comunidad actualizada con éxito');
        return redirect()->route('admin.comunidad.index');
    }

    public function destroy($id)
    {
        $comunidad = Comunidad::find($id);
        $comunidad->delete();
        Alert::success('Comunidad eliminada con éxito');
        return redirect()->route('admin.comunidad.index');
    }
}
