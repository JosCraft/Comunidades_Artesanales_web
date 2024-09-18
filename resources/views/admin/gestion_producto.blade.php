<x-layouts.app-admin>
    @vite(['resources/js/buscar_en_tabla.js'])


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
            <a class="btn btn-primary" href="{{ route('admin.gestion_productos.create') }}">
                Crear Producto
            </a>
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
                            <button type="button" class="btn btn-outline-primary show-product-details"
                                data-bs-toggle="modal" data-bs-target="#exampleModal"
                                data-product="{{ json_encode([
                                    'id' => $producto->id,
                                    'nombre_producto' => $producto->nombre_producto,
                                    'imagen' => $producto->imagen,
                                    'id_categoria' => $producto->id_categoria,
                                    'texto_corto' => $producto->texto_corto,
                                    'precio' => $producto->precio,
                                    'size' => $producto->size,
                                    'color' => $producto->color,
                                    'qty' => $producto->qty,
                                    'estado' => $producto->estado,
                                    'contenido' => $producto->contenido
                                ]) }}">
                                Ver
                            </button>



                            <a href="{{ route('admin.gestion_productos.edit', $producto->id) }}"
                                class="btn btn-primary">
                                Editar
                            </a>
                            <form action="{{ route('admin.gestion_productos.destroy', $producto->id) }}"
                                method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
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



<!-- Modal Ver todos los datos-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detalles del Producto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="inputs">
                    <form method="POST" action="" enctype="multipart/form-data">
                        @csrf
                        <p>ID                : <input id="product-id-input" name="id" readonly></p>
                        <p>Nombre Producto   : <input id="product-nombre-input" name="nombre_producto"></p>
                        <p>Imagen            : <input id="product-imagen-input" name="imagen"></p>
                        <p>Categoria         :
                            <select class="form-select" aria-label="Default select example" name="id_categoria">
                                <!-- Opciones de categorías aquí -->
                            </select>
                        </p>
                        <p>Texto Corto       : <input id="product-texto-input" name="texto_corto"></p>
                        <p>Precio            : <input id="product-precio-input" name="precio"></p>
                        <p>Tamaño            : <input id="product-size-input" name="size"></p>
                        <p>Color             : <input id="product-color-input" name="color"></p>
                        <p>Cantidad          : <input id="product-qty-input" name="qty"></p>
                        <p>Estado            : <input id="product-estado-input" name="estado"></p>
                        <p>Contenido         : <textarea id="product-contenido-input" name="contenido"></textarea></p>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </form>
                </div>
                <div class="Inf">
                    <p>ID                : <span id="product-id-display"></span></p>
                    <p>Nombre Producto   : <span id="product-nombre-display"></span></p>
                    <p>Imagen            : <img id="product-imagen-display" src="" alt="Imagen del Producto"></p>
                    <p>Categoria         : <span id="product-categoria-display"></span></p>
                    <p>Texto Corto       : <span id="product-texto-display"></span></p>
                    <p>Precio            : <span id="product-precio-display"></span></p>
                    <p>Tamaño            : <span id="product-size-display"></span></p>
                    <p>Color             : <span id="product-color-display"></span></p>
                    <p>Cantidad          : <span id="product-qty-display"></span></p>
                    <p>Estado            : <span id="product-estado-display"></span></p>
                    <p>Contenido         : <span id="product-contenido-display"></span></p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" id="edit-button" class="btn btn-primary">Editar</button>
            </div>
        </div>
    </div>
</div>



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#exampleModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Botón que abrió el modal
            var productData = button.data('product'); // Extraer datos del botón
            console.log(productData.id);
            // Asegúrate de que productData no esté vacío y es un objeto JSON válido
            if (productData) {
                // Llenar los campos del modal con los datos del producto
                $('#product-id-display').text(productData.id);
                $('#product-nombre-display').text(productData.nombre_producto);
                $('#product-imagen-display').attr('src', productData.imagen);
                $('#product-categoria-display').text(productData.id_categoria);
                $('#product-texto-display').text(productData.texto_corto);
                $('#product-precio-display').text(productData.precio);
                $('#product-size-display').text(productData.size);
                $('#product-color-display').text(productData.color);
                $('#product-qty-display').text(productData.qty);
                $('#product-estado-display').text(productData.estado);
                $('#product-contenido-display').text(productData.contenido);

                // También actualizar los campos del formulario
                $('#product-id-input').val(productData.id);
                $('#product-nombre-input').val(productData.nombre_producto);
                $('#product-imagen-input').val(productData.imagen);
                $('#product-texto-input').val(productData.texto_corto);
                $('#product-precio-input').val(productData.precio);
                $('#product-size-input').val(productData.size);
                $('#product-color-input').val(productData.color);
                $('#product-qty-input').val(productData.qty);
                $('#product-estado-input').val(productData.estado);
                $('#product-contenido-input').val(productData.contenido);
            } else {
                console.error('No data found for this product.');
            }
        });
    });
</script>








</x-layouts.app-admin>
