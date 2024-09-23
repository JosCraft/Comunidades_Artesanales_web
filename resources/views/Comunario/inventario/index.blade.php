<x-layouts.app>
    <h1>Control de Inventario</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre del Producto</th>
                <th>Stock</th>
                <th>Precio</th>
            </tr>
        </thead>
        <tbody>
            @foreach($productos as $producto)
                <tr>
                    <td>{{ $producto->id }}</td>
                    <td>{{ $producto->nombreProducto }}</td>
                    <td>{{ $producto->stock }}</td>
                    <td>{{ $producto->precio }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-layouts.app>
