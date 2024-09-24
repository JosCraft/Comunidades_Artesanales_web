@extends('layouts.app')

@section('content')
    <h1>Crear Nueva Promoción</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('comunario.promociones.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="id_producto">Producto:</label>
            <select name="id_producto" id="id_producto" class="form-control" required>
                <!-- Aquí deberías listar los productos disponibles -->
                @foreach($productos as $producto)
                    <option value="{{ $producto->id }}">{{ $producto->nombreProducto }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="descuento">Descuento (%):</label>
            <input type="number" name="descuento" id="descuento" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="fecha_inicio">Fecha de Inicio:</label>
            <input type="date" name="fecha_inicio" id="fecha_inicio" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="fecha_fin">Fecha de Fin:</label>
            <input type="date" name="fecha_fin" id="fecha_fin" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Crear Promoción</button>
    </form>

    <a href="{{ route('comunario.promociones') }}" class="btn btn-secondary mt-3">Volver a Promociones</a>
@endsection
