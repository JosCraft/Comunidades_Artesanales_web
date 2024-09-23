<?php

namespace App\Http\Controllers\Comunario;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

use App\Models\Comunario;

class GestionInventarioController extends Controller{

    public function index(){
        $usuario = Auth::user()->id;
        $comunario = Comunario::where('user_id', $usuario)->first();
        $productos = $comunario->productos;
        return view('/Comunario/inventario', ['productos' => $productos, 'comunario' => $comunario])
        ->with('success', session('success'))
            ->with('error', session('error'));
    }



}
