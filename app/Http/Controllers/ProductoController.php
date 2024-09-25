<?php
namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::with('categoria')->get();
        $categorias = Categoria::all();
        return view('productos.index', compact('productos', 'categorias'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre_producto' => 'required|string|max:255',
            'precio' => 'required|numeric|min:0',
            //'id_categoria' => 'required|exists:categorias,id',
            // Agregar validaciones adicionales según sea necesario
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 422);
        }

        $producto = Producto::create($request->all());

        return response()->json(['success' => 'Producto agregado exitosamente.']);
    }

    public function edit($id)
    {
        $producto = Producto::findOrFail($id);
        return response()->json(['producto' => $producto]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nombre_producto' => 'required|string|max:255',
            'precio' => 'required|numeric|min:0',
            'id_categoria' => 'required|exists:categorias,id',
            // Agregar validaciones adicionales según sea necesario
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 422);
        }

        $producto = Producto::findOrFail($id);
        $producto->update($request->all());

        return response()->json(['success' => 'Producto actualizado exitosamente.']);
    }

    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->delete();

        return response()->json(['success' => 'Producto eliminado exitosamente.']);
    }
}
