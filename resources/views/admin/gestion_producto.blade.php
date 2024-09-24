<x-layouts.app-admin>
    @vite(['resources/css/style_img_table.css','resources/js/buscar_en_tabla.js'])

    @if (session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    title: '¡Éxito!',
                    text: '{{ session('message') }}',
                    icon: 'success',
                    confirmButtonText: 'Aceptar'
                });
            });
        </script>
    @endif
    <!-- SweetAlert para errores de validación -->
    @if ($errors->any())
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    title: 'Error en la validación',
                    html: `
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                `,
                    icon: 'error',
                    confirmButtonText: 'Aceptar'
                });
            });
        </script>
    @endif

    <h1>Gestion de Productos</h1>

    <div class="d-flex flex-row bd-highlight mb-3">
        <div class="p-2 bd-highlight">

        </div>
        <div class="p-2 bd-highlight">
            <input type="text" class="form-control" id="buscar" placeholder="Buscar....">
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Imagen</th>
                    <th>Categoria</th>
                    <th>Precio</th>
                    <th>Stock</th>
                    <th>Estado</th>
                    <th>Promociones</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($productos as $producto)
                    <tr>
                        <td>{{ $producto->nombre_producto }}</td>
                        <td>
                            <img src="data:image/jpeg;base64,{{ base64_encode($producto->imagen) }}"
                                alt="{{ $producto->nombre_producto }}" class="foto_producto">
                        </td>
                        <td> {{ $producto->categoria->nombre }} </td>
                        <td>{{ $producto->precio }} </td>
                        <td>{{ $producto->qty }} </td>
                        <td>{{ $producto->estado }} </td>
                        <td>
                            @foreach ($producto->promociones as $promocion)
                                {{ $promocion->nombre_promocion }} -
                            @endforeach
                        </td>
                        <td>

                            <a href="{{ route('admin.gestion_productos.edit', $producto->id) }}"
                                class="btn btn-primary">
                                Editar
                            </a>

                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <!-- Enlace para la página anterior -->
            <li class="page-item {{ $productos->onFirstPage() ? 'disabled' : '' }}">
                <a class="page-link" href="{{ $productos->previousPageUrl() }}" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>

            <!-- Enlaces para las páginas -->
            @for ($i = 1; $i <= $productos->lastPage(); $i++)
                <li class="page-item {{ $productos->currentPage() == $i ? 'active' : '' }}">
                    <a class="page-link" href="{{ $productos->url($i) }}">{{ $i }}</a>
                </li>
            @endfor

            <!-- Enlace para la página siguiente -->
            <li class="page-item {{ $productos->hasMorePages() ? '' : 'disabled' }}">
                <a class="page-link" href="{{ $productos->nextPageUrl() }}" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>


</x-layouts.app-admin>
