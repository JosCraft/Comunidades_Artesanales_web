<?php
namespace App\Http\Controllers\Comunario;

use Illuminate\Http\Request;
use App\Models\Producto;

use App\Http\Controllers\Controller;

class InventarioController extends Controller {
    public function index() {
        $productos = Producto::all();
        return view('comunario.inventario.index', compact('productos'));
    }
}
    