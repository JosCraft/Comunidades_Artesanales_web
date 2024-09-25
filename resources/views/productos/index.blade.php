@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-center">Productos</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="text-end mb-3">
        <button class="btn btn-primary" id="btn-agregar">Agregar Producto</button>
    </div>

    <table class="table table-striped table-bordered" id="productos-table">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Imagen</th>
                <th>Nombre del Producto</th>
                <th>Texto Corto</th>
                <th>Precio</th>
                <th>Tamaño</th>
                <th>Color</th>
                <th>Cantidad</th>
                <th>Categoría</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($productos as $producto)
            <tr id="producto-{{ $producto->id }}">
                <td>{{ $producto->id }}</td>
                <td>
                    @if ($producto->imagen)
                        <img src="data:image/jpeg;base64,{{ base64_encode($producto->imagen) }}" alt="{{ $producto->nombre_producto }}" style="width: 50px; height: 50px; object-fit: cover;">
                    @else
                        <span>No disponible</span>
                    @endif
                </td>
                <td>{{ $producto->nombre_producto }}</td>
                <td>{{ $producto->texto_corto }}</td>
                <td>${{ number_format($producto->precio, 2) }}</td>
                <td>{{ $producto->size ?? 'N/A' }}</td>
                <td>{{ $producto->color ?? 'N/A' }}</td>
                <td>{{ $producto->qty ?? 0 }}</td>
                <td>{{ $producto->categoria->nombre ?? 'N/A' }}</td> <!-- Mostrar la categoría -->
                <td>{{ $producto->estado == '1' ? 'Activo' : 'Inactivo' }}</td>
                <td>
                    <button class="btn btn-warning btn-editar" data-id="{{ $producto->id }}">Editar</button>
                    <button class="btn btn-danger btn-eliminar" data-id="{{ $producto->id }}">Eliminar</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Modal para Crear/Editar Producto -->
<div class="modal fade" id="productoModal" tabindex="-1" role="dialog" aria-labelledby="productoModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="productoModalLabel">Agregar Producto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="productoForm" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" id="producto_id" name="id">

                    <div class="form-group">
                        <label for="imagen">Imagen</label>
                        <input type="file" class="form-control" id="imagen" name="imagen" accept="image/*">
                        <div class="invalid-feedback"></div>
                    </div>

                    <div class="form-group">
                        <label for="nombre_producto">Nombre del Producto</label>
                        <input type="text" class="form-control" id="nombre_producto" name="nombre_producto" required>
                        <div class="invalid-feedback"></div>
                    </div>

                    <div class="form-group">
                        <label for="texto_corto">Texto Corto</label>
                        <textarea class="form-control" id="texto_corto" name="texto_corto" rows="2"></textarea>
                        <div class="invalid-feedback"></div>
                    </div>

                    <div class="form-group">
                        <label for="precio">Precio</label>
                        <input type="number" class="form-control" id="precio" name="precio" required>
                        <div class="invalid-feedback"></div>
                    </div>

                    <div class="form-group">
                        <label for="size">Tamaño</label>
                        <input type="text" class="form-control" id="size" name="size">
                        <div class="invalid-feedback"></div>
                    </div>

                    <div class="form-group">
                        <label for="color">Color</label>
                        <input type="text" class="form-control" id="color" name="color">
                        <div class="invalid-feedback"></div>
                    </div>

                    <div class="form-group">
                        <label for="qty">Cantidad Disponible</label>
                        <input type="number" class="form-control" id="qty" name="qty" min="0">
                        <div class="invalid-feedback"></div>
                    </div>

                    <div class="form-group">
                        <label for="categoria_id">Categoría</label>
                        <select class="form-control" id="categoria_id" name="categoria_id" required>
                            <option value="">Seleccione una categoría</option>
                            @foreach($categorias as $categoria)
                                <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback"></div>
                    </div>

                    <div class="form-group">
                        <label for="estado">Estado</label>
                        <select class="form-control" id="estado" name="estado">
                            <option value="0">Inactivo</option>
                            <option value="1">Activo</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="btn-guardar">Guardar Producto</button>
            </div>
        </div>
    </div>
</div>

<!-- Carga de jQuery completo -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $(document).ready(function() {
        // Abrir modal para agregar producto
        $('#btn-agregar').click(function() {
            $('#productoModalLabel').text('Agregar Producto');
            $('#productoForm')[0].reset();
            $('#producto_id').val('');
            $('#categoria_id').val(''); // Resetear categoría
            $('#productoModal').modal('show');
        });

        // Guardar o actualizar producto
        $('#btn-guardar').click(function() {
            const id = $('#producto_id').val();
            const url = id ? `/productos/${id}` : '/productos';
            const method = id ? 'PUT' : 'POST';

            const formData = new FormData($('#productoForm')[0]);

            $.ajax({
                url: url,
                method: method,
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    alert(response.success);
                    location.reload();
                },
                error: function(xhr) {
                    if (xhr.status === 422) {
                        const errors = xhr.responseJSON.errors;
                        $.each(errors, function(key, value) {
                            $(`#${key}`).addClass('is-invalid');
                            $(`#${key} + .invalid-feedback`).text(value[0]);
                        });
                    } else {
                        alert('Error al guardar el producto: ' + xhr.responseText);
                    }
                }
            });
        });

        // Abrir modal para editar producto
        $('.btn-editar').click(function() {
            const id = $(this).data('id');

            $.ajax({
                url: `/productos/${id}/edit`,
                method: 'GET',
                success: function(response) {
                    $('#productoModalLabel').text('Editar Producto');
                    $('#producto_id').val(response.producto.id);
                    $('#nombre_producto').val(response.producto.nombre_producto);
                    $('#texto_corto').val(response.producto.texto_corto);
                    $('#precio').val(response.producto.precio);
                    $('#size').val(response.producto.size);
                    $('#color').val(response.producto.color);
                    $('#qty').val(response.producto.qty);
                    $('#categoria_id').val(response.producto.categoria_id); // Cargar categoría
                    $('#estado').val(response.producto.estado);
                    $('#productoModal').modal('show');
                },
                error: function(xhr) {
                    alert('Error al cargar el producto: ' + xhr.responseText);
                }
            });
        });

        // Eliminar producto
        $('.btn-eliminar').click(function() {
            const id = $(this).data('id');
            if (confirm('¿Estás seguro de que deseas eliminar este producto?')) {
                $.ajax({
                    url: `/productos/${id}`,
                    method: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        alert(response.success);
                        $(`#producto-${id}`).remove();
                    },
                    error: function(xhr) {
                        alert('Error al eliminar el producto: ' + xhr.responseText);
                    }
                });
            }
        });
    });
</script>
@endsection
