<x-layouts.app
    :title="'Inicio'">
    <?php
        $categorias = App\Models\Categoria::all();
    ?>


<form action="{{ route('productos.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <select name="id_categoria" required>
        <option value="">Seleccione una categoria</option>
        @foreach ($categorias as $categoria)
            <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
        @endforeach
    </select>
    <input type="text" name="nombre_producto" placeholder="Nombre del producto" required>
    <input type="file" name="imagen" required>
    <button type="submit">Subir Producto</button>
</form>


</x-layouts.app>
