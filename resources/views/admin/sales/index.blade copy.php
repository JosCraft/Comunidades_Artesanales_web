
@extends('admin.layout.layout')

@section('content')
    <h2>Reporte de Ventas</h2>

    <!-- Formulario para seleccionar rango de fechas -->
    <form action="{{ route('sales.filter') }}" method="GET">
        <div class="form-group">
            <label for="start_date">Fecha de Inicio</label>
            <input type="date" id="start_date" name="start_date" class="form-control" required value="{{ request('start_date') }}">
        </div>
        <div class="form-group">
            <label for="end_date">Fecha de Fin</label>
            <input type="date" id="end_date" name="end_date" class="form-control" required value="{{ request('end_date') }}">
        </div>
        <button type="submit" class="btn btn-primary">Filtrar Ventas</button>
    </form>

    <!-- Mostrar total de ventas en el rango seleccionado -->
    @isset($totalSales)
        <h3>Total de Ventas: Bs. {{ number_format($totalSales, 2) }}</h3>
    @endisset

    <!-- Tabla de ventas -->
    <table class="table table-striped mt-4">
        <thead>
            <tr>
                <th>ID Pedido</th>
                <th>Fecha</th>
                <th>Cliente</th>
                <th>Total</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($sales as $sale)
                <tr>
                    <td>{{ $sale->id }}</td>
                    <td>{{ $sale->created_at->format('Y-m-d H:i') }}</td>
                    <td>{{ $sale['name'] }}</td> <!-- Ajusta según el nombre del cliente -->
                    <td>Bs. {{ number_format($sale->grand_total, 2) }}</td>
                    <td>{{ $sale->order_status }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">No hay ventas en el rango seleccionado</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
