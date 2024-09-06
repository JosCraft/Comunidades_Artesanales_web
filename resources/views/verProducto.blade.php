<x-layouts.app>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>{{ $producto->nombre_producto }}</h1>
                <img src="data:image/jpeg;base64,{{ base64_encode($producto->imagen) }}" alt="{{ $producto->nombre_producto }}" class="img-fluid">
                <p>{{ $producto->categoria->nombre_categoria }}</p>
            </div>
        </div>
    </div>
</x-layouts.app>
