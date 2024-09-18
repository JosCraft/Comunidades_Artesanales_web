<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto; 

class InventarioController extends Controller {
    public function index() {
        $productos = Producto::all();
        return view('comunario.inventario.index', compact('productos'));
    }
}