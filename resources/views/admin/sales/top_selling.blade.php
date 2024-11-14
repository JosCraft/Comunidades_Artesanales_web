
@extends('admin.layout.layout')

@section('content')
    <h2>Productos Más Vendidos</h2>

    <!-- Formulario para seleccionar rango de fechas -->
    <form action="{{ route('sales.topSelling') }}" method="GET">
        <div class="form-group">
            <label for="start_date">Fecha de Inicio</label>
            <input type="date" id="start_date" name="start_date" class="form-control" required value="{{ request('start_date') }}">
        </div>
        <div class="form-group">
            <label for="end_date">Fecha de Fin</label>
            <input type="date" id="end_date" name="end_date" class="form-control" required value="{{ request('end_date') }}">
        </div>
        <button type="submit" class="btn btn-primary">Buscar</button>
    </form>

    <!-- Tabla de productos más vendidos -->
    <table class="table table-striped mt-4">
        <thead>
            <tr>
                <th>Producto ID</th>
                <th>Nombre del Producto</th>
                <th>Total Vendido</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($topProducts as $product)
                <tr>
                    <td>{{ $product->product_id }}</td>
                    <td>{{ $product->product_name }}</td>
                    <td>{{ $product->total_sold }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center">No hay productos vendidos en el rango seleccionado</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
