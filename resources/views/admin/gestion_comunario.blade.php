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

    <h1>Gestion de Comunarios</h1>

    <div class="d-flex flex-row bd-highlight mb-3">
        <div class="p-2 bd-highlight">
            <input type="text" class="form-control" id="buscar" placeholder="Buscar....">
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>CI</th>
                    <th>Nombre</th>
                    <th>Especialidad</th>
                    <th>Comunidad</th>
                    <th>Cant. Productos</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($comunarios as $comunario)
                    <tr>
                        <td>{{ $comunario->id }}</td>
                        <td> {{ $comunario->user->nombre }} </td>
                        <td> {{ $comunario->especialidad }} </td>
                        <td> {{ $comunario->comunidad->nombre_comunidad }} </td>
                        <td> {{ $comunario->productos->count() }} </td>
                        <td>
                            <a href="{{ route('admin.gestion_comunario.edit', $comunario->id) }}" class="btn btn-primary">Ver</a>
                            <form action="{{ route('admin.gestion_comunario.destroy', $comunario->id) }}" method="POST"
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



</x-layouts.app-admin>
