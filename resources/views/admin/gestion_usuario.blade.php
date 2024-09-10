<x-layouts.app>
    @vite(['resources/js/admin_gestionUsuarios.js','resources/js/buscar_en_tabla.js',])
    <h1>Gestion de usuarios</h1>

    <div class="d-flex flex-row bd-highlight mb-3" >
        <div class="p-2 bd-highlight">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#crearModal">
                Crear Usuario
            </button>
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
                            <button type="button" class="btn btn-primary show-user-details"
                                data-bs-toggle="modal"
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
                                    'rol' => $user->roles->pluck('id')->first() // Obtener el ID del rol
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
                <form action="">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre">
                        </div>
                        <div class="mb-3">
                            <label for="apePaterno" class="form-label">Apellido Paterno</label>
                            <input type="text" class="form-control" id="apePaterno" name="apePaterno">
                        </div>
                        <div class="mb-3">
                            <label for="apeMaterno" class="form-label">Apellido Materno</label>
                            <input type="text" class="form-control" id="apeMaterno" name="apeMaterno">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Correo</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>

                        <div class="mb-3">
                            <label for="celular" class="form-label">Celular</label>
                            <input type="text" class="form-control" id="celular" name="celular">
                        </div>

                        <div class="mb-3">
                            <label for="fechaNac" class="form-label">Fecha de Nacimiento</label>
                            <input type="date" class="form-control" id="fechaNac" name="fechaNac">
                        </div>

                        <div class="mb-3">
                            <label for="rol" class="form-label">Rol</label>
                            <select class="form-select" aria-label="Default select example" id="rol" name="rol">
                                <option selected>Seleccionar</option>
                                <option value="1">Administrador</option>
                                <option value="2">Usuario</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
     </div>

     <!-- Modal CREAR -->
        <div class="modal fade" id="crearModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Crear Usuario</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('admin.gestion_usuario.store') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <x-form.register />
                        <!-- boton guardar o cancelar-->
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Guardar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>

    </script>

</x-layouts.app>
