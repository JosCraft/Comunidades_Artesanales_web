<?php
namespace App\Http\Controllers\Comunario;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Promocion;
use App\Models\Producto;

class PromocionController extends Controller {
    public function index() {
        $promociones = Promocion::all();
        $productos = Producto::all();
        return view('comunario.promociones.index', ['promociones' => $promociones, 'productos' => $productos]);
    }

    public function store(Request $request) {
        $request->validate([
            'id_producto' => 'required',
            'descuento' => 'required|numeric',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after:fecha_inicio',
        ]);

        Promocion::create($request->all());
        return redirect()->route('comunario.promociones')->with('success', 'Promoción creada exitosamente.');
    }
}
