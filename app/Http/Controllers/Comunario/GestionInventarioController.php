<?php

namespace App\Http\Controllers\Comunario;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ProductosController;

use Illuminate\Http\Request;
use App\Http\Requests\ProductoRequest;
use Auth;

use App\Models\Comunario;
use App\Models\Producto;

class GestionInventarioController extends Controller{

    public function index(){
        $usuario = Auth::user()->id;
        $comunario = Comunario::where('user_id', $usuario)->first();
        $productos = $comunario->productos;
        return view('/Comunario/inventario', ['productos' => $productos, 'comunario' => $comunario])
        ->with('success', session('success'))
            ->with('error', session('error'));
    }

    public function edit(Producto $producto){
        return view('/Comunario/producto/edit_producto', ['producto' => $producto]);
    }

    public function update(ProductoRequest  $request, $id)
    {
        $response = app(ProductosController::class)->update($request, $id);
        if ($response->status == 'success') {
            return redirect()->route('admin.gestion_productos')->with('success', $response->message);
        } else {
            return back()->with('error', $response->message);
        }
    }



}
