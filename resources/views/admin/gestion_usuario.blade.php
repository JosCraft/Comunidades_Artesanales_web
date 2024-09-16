<x-layouts.app-admin>
    @vite(['resources/js/admin_gestionUsuarios.js', 'resources/js/buscar_en_tabla.js'])
    <h1>Gestion de usuarios</h1>

    <div class="d-flex flex-row bd-highlight mb-3">
        <div class="p-2 bd-highlight">
            <a class="btn btn-primary" href="{{ route('admin.gestion_usuario.create') }}">
                Crear Usuario
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
                    <th>Ci</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Correo</th>
                    <th>Rol</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->nombre }}</td>
                        <td>{{ $user->apePaterno }} {{ $user->apeMaterno }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->getRoleNames() }}</td>
                        <td>
                            <button type="button" class="btn btn-primary show-user-details" data-bs-toggle="modal"
                                data-bs-target="#datosModal"
                                data-user="{{ json_encode([
                                    'nombre' => $user->nombre,
                                    'apePaterno' => $user->apePaterno,
                                    'apeMaterno' => $user->apeMaterno,
                                    'email' => $user->email,
                                    'password' => $user->password,
                                    'celular' => $user->celular,
                                    'fechaNac' => $user->fechaNac,
                                    'ci' => $user->id,
                                    'rol' => $user->roles->pluck('id')->first(), // Obtener el ID del rol
                                ]) }}">
                                Editar
                            </button>
                            <form action="{{ route('admin.gestion_usuario.destroy', $user) }}" method="POST">
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

   <!-- Modal EDITAR -->
<div class="modal fade" id="datosModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Datos</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.gestion_usuario.update', ['id' => $user->id]) }}" method="POST" id="editarForm">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <!-- Formulario de edición reutilizable -->
                    <x-form.register />

                    <!-- Roles -->
                    <div class="row mb-3" id="roles-container">
                        <label for="rol" class="col-md-4 col-form-label text-md-end">{{ __('Rol') }}</label>
                        <div class="col-md-6">
                            <select id="rol" class="form-select @error('rol') is-invalid @enderror" name="roles[]" required>
                                <option value="1">Administrador</option>
                                <option value="2">Usuario</option>
                                <option value="3">Comunario</option>
                                <option value="4">Delivery</option>
                            </select>
                            @error('rol')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <!-- Botón para agregar más roles -->
                    <div class="row mb-3">
                        <div class="col-md-6 offset-md-4">
                            <button type="button" id="add-role-btn" class="btn btn-success">Agregar Rol</button>
                        </div>
                    </div>

                    <!-- Formularios dinámicos basados en el rol -->
                    <div id="form-admin" style="display: none;">
                        <x-form.register-admin />
                    </div>
                    <div id="form-comunario" style="display: none;">
                        <x-form.register-comunario />
                    </div>
                    <div id="form-delivery" style="display: none;">
                        <x-form.register-delivery />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>



</x-layouts.app-admin>
