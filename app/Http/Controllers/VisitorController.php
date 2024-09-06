<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Producto;
use App\Models\Categoria;

class VisitorController extends Controller
{
    public function welcome(){
        $productos = Producto::all();
        $categorias = Categoria::all();
        return view('welcome',['productos'=>$productos,'categorias'=>$categorias]);
    }

    public function comunidades(){
        $comunidades = Comunidad::all();
        return view('Visitor/comunidad',['comunidades'=>$comunidades]);
    }

    public function productos(){
        $productos = Producto::all();
        return view('Visitor/producto',['productos'=>$productos]);
    }

    public function contacto(){
        return view('Visitor/contacto');
    }

}
