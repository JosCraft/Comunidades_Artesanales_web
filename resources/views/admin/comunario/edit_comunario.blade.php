<x-layouts.app-admin>
    @vite(['resources/js/buscar_en_tabla.js'])
    @vite(['resources/css/style_img_table.css',])

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

    <h1>Datos del comunario {{ $comunario->user->nombre }} </h1>
    <div class="row">
        <div class="col">
            <h2>Datos</h2>

            <div class="ver">
                <button class="btn btn-primary" onclick="document.querySelector('.ver').hidden = true; document.querySelector('.editar').hidden = false;">Editar</button>
                <p>CI: {{ $comunario->user->id }}</p>
                <p>Nombre: {{ $comunario->user->nombre }}</p>
                <p>Especialidad: {{ $comunario->especialidad }}</p>
                <p>Comunidad: {{ $comunario->comunidad->nombre_comunidad }}</p>
            </div>
            <div class="editar" hidden>

                <form action="{{ route('admin.gestion_comunario.update', $comunario) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $comunario->user->nombre }}">
                    </div>
                    <div class="mb-3">
                        <label for="especialidad" class="form-label
                        ">Especialidad</label>
                        <input type="text" class="form-control" id="especialidad" name="especialidad" value="{{ $comunario->especialidad }}">
                    </div>
                    <div class="mb-3">
                        <label for="comunidad" class="form-label">Comunidad</label>
                        <select class="form-select" id="comunidad" name="comunidad">
                            @foreach ($comunidades as $comunidad)
                                <option value="{{ $comunidad->id }}" @if ($comunidad->id == $comunario->comunidad_id) selected @endif>{{ $comunidad->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </form>
                <button class="btn btn-danger" onclick="document.querySelector('.ver').hidden = false; document.querySelector('.editar').hidden = true;">Cancelar</button>
            </div>
         </div>
        <div class="col">
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
                    @foreach ($comunario->productos as $producto)
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




</x-layouts.app-admin>
