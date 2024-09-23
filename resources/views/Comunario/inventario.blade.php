<x-layouts.app-comunario>
    <h1>Inventario</h1>
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

    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Productos</h2>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Agregar Producto
                  </button>
                <div class="d-flex flex-row bd-highlight mb-3">
                    <div class="p-2 bd-highlight">
                        <input type="text" class="form-control" id="buscar" placeholder="Buscar....">
                    </div>
                </div>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Precio</th>
                            <th>Imagen</th>
                            <th>Stock</th>
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
                                <td>{{ $producto->precio }}</td>
                                <td>{{ $producto->qty }}</td>
                                <td>
                                    <a href="{{ route('admin.gestion_productos.edit', $producto->id) }}" class="btn btn-primary">Ver</a>
                                    <form action="{{ route('comunario.producto.remove',
                                    ['comunario' => $comunario->id, 'producto' => $producto->id]
                                    ) }}" method="POST"
                                        class="d-inline">
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
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Registrar Nuevo Producto</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('comunario.producto.add', $comunario->id ) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <x-form.register-producto :comunario="$comunario" />
                    <div class="row mb-3">
                        <label for="fecha_fabricacion" class="col-md-4 col-form-label text-md-end">{{ __('Fecha de fabricación') }}</label>
                        <div class="col-md-6">
                            <input type="date" class="form-control @error('fecha_fabricacion') is-invalid @enderror" name="fecha_fabricacion" value="{{ old('fecha_fabricacion', now()) }}" required>
                            @error('fecha_fabricacion')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                 </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                  </div>
            </form>
          </div>
        </div>
      </div>


</x-layouts.app-comunario>
