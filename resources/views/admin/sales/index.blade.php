@extends('admin.layout.layout')

@section('content')
<div class="container my-4">

    <div class="card shadow-sm border-0 mb-4">
        <div class="card-header" style="background-color: #04BFBF; color: white;">
            <h2 class="h4 mb-0">Reporte de Ventas</h2>
        </div>
        <div class="card-body" style="background-color: #F2F2F2;">
            <!-- Formulario para seleccionar rango de fechas y tipo de reporte -->
            <form action="{{ route('sales.filter') }}" method="GET" class="d-flex flex-wrap align-items-end">
                <div class="form-group col-md-4 mb-3 pe-md-3">
                    <label for="start_date" class="form-label">Fecha de Inicio</label>
                    <input type="date" id="start_date" name="start_date" class="form-control" required value="{{ request('start_date') }}">
                </div>
                <div class="form-group col-md-4 mb-3 pe-md-3">
                    <label for="end_date" class="form-label">Fecha de Fin</label>
                    <input type="date" id="end_date" name="end_date" class="form-control" required value="{{ request('end_date') }}">
                </div>
                <div class="form-group col-md-4 mb-3 pe-md-3">
                    <label for="report_type" class="form-label">Tipo de Reporte</label>
                    <select id="report_type" name="report_type" class="form-select" required>
                        <option value="sales" {{ request('report_type') == 'sales' ? 'selected' : '' }}>Ventas Totales</option>
                        <option value="top_products" {{ request('report_type') == 'top_products' ? 'selected' : '' }}>Productos Más Vendidos</option>
                    </select>
                </div>
                <div class="col-12 d-flex justify-content-end">
                    <button type="submit" class="btn" style="background-color: #D99A25; color: white;">Generar Reporte</button>
                    <!-- Botón para exportar a PDF -->
                    <a href="{{ route('sales.export_pdf', ['start_date' => request('start_date'), 'end_date' => request('end_date'), 'report_type' => request('report_type')]) }}" target="_blank" class="btn ms-2" style="background-color: #D95436; color: white;">
                        Exportar a PDF
                    </a>
                </div>
            </form>
        </div>
    </div>

    <!-- Mostrar tabla según el tipo de reporte seleccionado -->
    @if($reportType == 'sales')
        <div class="card shadow-sm border-0 mb-4">
            <div class="card-header" style="background-color: #D99A25; color: white;">
                <h3 class="h5 mb-0">Ventas Totales</h3>
                @isset($totalSales)
                    <span class="badge" style="background-color: #A66953; color: white;">Total: Bs. {{ number_format($totalSales, 2) }}</span>
                @endisset
            </div>
            <div class="card-body p-0">
                <table class="table table-striped table-hover mb-0">
                    <thead style="background-color: #04BFBF; color: white;">
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
                                <td>{{ $sale['name'] }}</td>
                                <td>Bs. {{ number_format($sale->grand_total, 2) }}</td>
                                <td><span class="badge" style="background-color: #A66953; color: white;">{{ $sale->order_status }}</span></td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted">No hay ventas en el rango seleccionado</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    @elseif($reportType == 'top_products')
        <div class="card shadow-sm border-0 mb-4">
            <div class="card-header" style="background-color: #D99A25; color: white;">
                <h3 class="h5 mb-0">Productos Más Vendidos</h3>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped table-hover mb-0">
                    <thead style="background-color: #04BFBF; color: white;">
                        <tr>
                            <th>ID Producto</th>
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
                                <td colspan="3" class="text-center text-muted">No hay productos vendidos en el rango seleccionado</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    @endif
</div>
@endsection
