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
                        <td>
                            {{ $user->getRoleNames() }}
                        </td>
                        <td>
                            <a href="{{ route('admin.gestion_usuario.edit', $user->id )}}" class="btn btn-primary">
                                Editar
                            </a>
                            <form action="{{ route('admin.gestion_usuario.destroy', $user) }}" method="POST",class="d-inline">
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
