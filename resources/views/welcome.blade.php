<x-layouts.app
    :title="'Inicio'">

    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center">Bienvenido a la tienda de Comunario</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <h2 class="text-center">Categorias</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <ul>
                    @foreach ($categorias as $categoria)
                        <li>{{ $categoria->nombre }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <h2 class="text-center">Productos</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <ul>
                    @foreach ($productos as $producto)
                        <li>{{ $producto->nombre }}</li>
                    @endforeach
                </ul>
            </div>

        </div>
    </div>


</x-layouts.app>
