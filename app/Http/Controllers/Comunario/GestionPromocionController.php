<?php

namespace App\Http\Controllers\Comunario;

use App\Http\Controllers\Controller;
use App\Http\Controllers\PromocionesController;

use Illuminate\Http\Request;
use App\Http\Requests\ProductoRequest;
use Auth;

use App\Models\Comunario;
use App\Models\Producto;
use App\Models\Promocion;


class GestionPromocionController extends Controller{

    public function index(){
        $usuario = Auth::user()->id;
        $comunario = Comunario::where('user_id', $usuario)->first();
        $productos = $comunario->productos;
        return view('/Comunario/promocion/promocion', ['productos' => $productos, 'comunario' => $comunario])
        ->with('success', session('success'))
            ->with('error', session('error'));
    }

    public function edit($id){
        $promocion = Promocion::find($id);
        $productos = Producto::all();
        return view('/Comunario/promocion/edit_promocion', ['promocion' => $promocion, 'productos' => $productos]);
    }

    public function update(Request $request, $id){
        return $request;
        $response = app(PromocionesController::class)->update($request, $id);
        if ($response->status == 'success') {
            return redirect()->route('comunario.promocion')->with('success', $response->message);
        } else {
            return back()->with('error', $response->message);
        }
    }


}
