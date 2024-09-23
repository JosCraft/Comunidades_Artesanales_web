<x-layouts.app-comunario>
    @if (session('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                title: '¡Éxito!',
                text: '{{ session('message ') }}',
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

    <h1>Editar Producto</h1>

    <form action="{{ route('admin.gestion_productos.update', $producto->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <x-form.register-producto :producto="$producto" :categorias="$categorias" />
        <div class="row mb-3">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    Actualizar
                </button>
            </div>
    </form>


</x-layouts.app-comunario>
