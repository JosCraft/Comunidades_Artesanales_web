<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Producto;

class ProductoController extends Controller
{
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre_producto' => 'required|string|max:255',
            'imagen' => 'required|image|max:2048', // Limitar el tamaño de la imagen a 2MB
            'id_categoria' => 'required|exists:categorias,id', // Asegúrate de que id_categoria existe en la tabla categorias
        ]);

        // Obtener el archivo de la imagen
        $imageFile = $request->file('imagen');

        // Leer el archivo como binario
        $imageBinary = file_get_contents($imageFile->getRealPath());

        // Crear y guardar el producto en la base de datos
        $producto = new Producto([
            'nombre_producto' => $request->nombre_producto,
            'imagen' => $imageBinary, // Guardar como binario
            'id_categoria' => $request->id_categoria,
        ]);

        $producto->save();

        return redirect()->back()->with('success', 'Producto subido exitosamente');
    }

    public function show($id)
    {
        $producto = Producto::find($id);

        return view('verProducto', compact('producto'));
    }

}
