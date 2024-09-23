<?php

namespace App\Http\Controllers\Comunario;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ProductosController;

use Illuminate\Http\Request;
use App\Http\Requests\ProductoRequest;
use Auth;

use App\Models\Comunario;
use App\Models\Producto;

class GestionPromocionController extends Controller{

    public function index(){
        $usuario = Auth::user()->id;
        $comunario = Comunario::where('user_id', $usuario)->first();
        $productos = $comunario->productos;
        return view('/Comunario/promocion', ['productos' => $productos, 'comunario' => $comunario])
        ->with('success', session('success'))
            ->with('error', session('error'));
    }

}
