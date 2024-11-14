<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reporte de Ventas</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 12px; }
        .header { text-align: center; margin-bottom: 20px; }
        .table { width: 100%; border-collapse: collapse; }
        .table th, .table td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        .table th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <div class="header">
        <h2>Reporte de Ventas</h2>
        <p>Rango de Fechas: {{ $startDate->format('d-m-Y') }} al {{ $endDate->format('d-m-Y') }}</p>
    </div>

    @if($reportType == 'sales')
        <h3>Total de Ventas: Bs. {{ number_format($totalSales, 2) }}</h3>
        <table class="table">
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
                @foreach ($sales as $sale)
                    <tr>
                        <td>{{ $sale->id }}</td>
                        <td>{{ $sale->created_at->format('d-m-Y H:i') }}</td>
                        <td>{{ $sale['name'] }}</td>
                        <td>Bs. {{ number_format($sale->grand_total, 2) }}</td>
                        <td>{{ $sale->order_status }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <h3>Productos Más Vendidos</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>ID Producto</th>
                    <th>Nombre del Producto</th>
                    <th>Total Vendido</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($topProducts as $product)
                    <tr>
                        <td>{{ $product->product_id }}</td>
                        <td>{{ $product->product_name }}</td>
                        <td>{{ $product->total_sold }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</body>
</html>
