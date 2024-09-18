@extends('layouts.app')

@section('content')
    <h1>Reportes de Ventas</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Producto</th>
                <th>Cantidad Vendida</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reportes as $reporte)
                <tr>
                    <td>{{ $reporte->id }}</td>
                    <td>{{ $reporte->producto->nombreProducto }}</td>
                    <td>{{ $reporte->cantidad }}</td>
                    <td>{{ $reporte->total }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
