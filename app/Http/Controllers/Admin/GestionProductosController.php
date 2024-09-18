<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ProductosController;

use App\Http\Requests\ProductoRequest;

use App\Models\Producto;

class GestionProductosController extends Controller{


    public function index()
    {
        // Obtener todos los productos
        $productos = Producto::paginate(10);

        // Retornar la vista con los productos y los mensajes de la sesión (si existen)
        return view('admin.gestion_producto', ['productos' => $productos])
            ->with('success', session('success'))
            ->with('error', session('error'));
    }

    public function indexMessage($response)
    {
        // Obtener todos los productos
        $productos = Producto::all();

        if ($response->status == 'success') {
            return view('admin.gestion_producto', ['productos' => $productos])->with('success', $response->message);
        } else {
            return view('admin.gestion_producto', ['productos' => $productos])->with('error', $response->message);
        }

    }


    public function create_producto()
    {
        return view('/admin/producto/create_producto');
    }

    public function store(ProductoRequest $request)
    {
        $response = app(ProductosController::class)->store($request);
        if ($response->status == 'success') {
            return redirect()->route('admin.gestion_productos')->with('success', $response->message);
        } else {
            return back()->with('error', $response->message);
        }

    }

    public function edit($id)
    {
        $producto = Producto::find($id);

        if (!$producto) {
            return redirect()->route('admin/producto/edit_producto')->with('error', 'Producto no encontrado');
        }

        return view('admin/producto/edit_producto', ['producto' => $producto]);
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

    public function destroy($id)
    {
        $response = app(ProductosController::class)->destroy($id);
        if ($response->status == 'success') {
            return redirect()->route('admin.gestion_productos')->with('success', $response->message);
        } else {
            return back()->with('error', $response->message);
        }
    }


}


