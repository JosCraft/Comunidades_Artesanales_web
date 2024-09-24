<x-layouts.app>
    <h1>Promociones</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Producto</th>
                <th>Descuento</th>
                <th>Fecha de Inicio</th>
                <th>Fecha de Fin</th>
            </tr>
        </thead>
        <tbody>
            @foreach($promociones as $promocion)
                <tr>
                    <td>{{ $promocion->id }}</td>
                    <td>{{ $promocion->producto->nombre_producto }}</td>
                    <td>{{ $promocion->descuento }}%</td>
                    <td>{{ $promocion->fecha_inicio }}</td>
                    <td>{{ $promocion->fecha_fin }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h2>Crear Nueva Promoción</h2>
    <form action="{{ route('comunario.promociones.store') }}" method="POST">
        @csrf
        <label for="id_producto">Producto:</label>
        <select name="id_producto" id="id_producto" required>
            <!-- Aquí deberías listar los productos disponibles -->
            @foreach($productos as $producto)
                <option value="{{ $producto->id }}">{{ $producto->nombre_producto }}</option>
            @endforeach
        </select>

        <label for="descuento">Descuento (%):</label>
        <input type="number" name="descuento" id="descuento" required>

        <label for="fecha_inicio">Fecha de Inicio:</label>
        <input type="date" name="fecha_inicio" id="fecha_inicio" required>

        <label for="fecha_fin">Fecha de Fin:</label>
        <input type="date" name="fecha_fin" id="fecha_fin" required>

        <button type="submit">Crear Promoción</button>
    </form>
</x-layouts.app>
