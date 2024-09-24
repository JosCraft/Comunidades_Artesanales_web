<x-layouts.app-admin>

    @php
        // Determinar cuál será el tab activo por defecto. Puede ser 'admin', 'delivery' o 'comunario'
        $defaultTab = $user->hasRole('Admin') ? 'admin' : ($user->hasRole('Delivery') ? 'delivery' : 'comunario');
    @endphp

    <div class="container" x-data="{ activeTab: '{{ $defaultTab }}' }">
        <div class="">
            <div class="">
                <h1>Editar Datos Usuario {{ $user->nombre }}</h1>

                <!-- SweetAlert para mensajes de éxito -->
                @if (session('message'))
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

                <div class="row">
                    <div class="col">
                        <!-- Formulario de edición de usuario -->
                        <form action="{{ route('admin.gestion_usuario.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <!-- Aquí debes pasar los datos del usuario actual como predeterminados -->
                            <x-form.register-user :user="$user" :oldData="old()" />

                            <button type="submit" class="btn btn-primary mt-3">Guardar Cambios</button>
                        </form>
                    </div>
                    <div class="col">
                        <!-- Tabs y formularios para roles -->
                        <div class="">
                            <div class="cabe">
                                <h1>Roles Registrados</h1>
                                <!-- Lista de roles que faltan con enlaces para abrir modales -->
                                <div>
                                    <h5>Agregar Rol</h5>

                                    @if (!$user->hasRole('Admin'))
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#adminModal">Administrador</a>
                                    @endif

                                    @if (!$user->hasRole('Comunario'))
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#comunarioModal">Comunario</a>
                                    @endif

                                    @if (!$user->hasRole('Delivery'))
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#deliveryModal">Delivery</a>
                                    @endif
                                </div>
                            </div>
                            <ul class="nav nav-tabs">
                                <!-- Mostrar tabs para los roles que tiene el usuario -->
                                @if ($user->hasRole('Admin'))
                                    <li class="nav-item">
                                        <a class="nav-link" :class="{ 'active': activeTab === 'admin' }" href="#" @click.prevent="activeTab = 'admin'">Administrador</a>
                                    </li>
                                @endif
                                @if ($user->hasRole('Delivery'))
                                    <li class="nav-item">
                                        <a class="nav-link" :class="{ 'active': activeTab === 'delivery' }" href="#" @click.prevent="activeTab = 'delivery'">Delivery</a>
                                    </li>
                                @endif
                                @if ($user->hasRole('Comunario'))
                                    <li class="nav-item">
                                        <a class="nav-link" :class="{ 'active': activeTab === 'comunario' }" href="#" @click.prevent="activeTab = 'comunario'">Comunario</a>
                                    </li>
                                @endif
                            </ul>

                            <!-- Formularios para cada rol -->
                            <div class="tab-content mt-3">
                                @if ($user->hasRole('Admin'))
                                    <div x-show="activeTab === 'admin'">
                                        <form action="{{ route('admin.gestion_usuario_role.update', ['role' => 'admin', 'user' => $user->id]) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <x-form.register-admin :user="$user->administrador" :oldData="old()" />
                                            <button type="submit" class="btn btn-primary mt-3">Actualizar Administrador</button>
                                            <!-- Botón para eliminar el rol de administrador -->

                                        </form>
                                        <form action="{{ route('admin.gestion_usuario_role.destroy', ['role' => 'admin', 'user' => $user->id]) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger mt-3">Eliminar Administrador</button>
                                        </form>
                                    </div>
                                @endif

                                @if ($user->hasRole('Delivery'))
                                    <div x-show="activeTab === 'delivery'">
                                        <form action="{{ route('admin.gestion_usuario_role.update', ['role' => 'delivery', 'user' => $user->id]) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <x-form.register-delivery :user="$user->delivery" :oldData="old()" />
                                            <button type="submit" class="btn btn-primary mt-3">Actualizar Delivery</button>
                                        </form>
                                        <!-- Botón para eliminar el rol de delivery -->
                                        <form action="{{ route('admin.gestion_usuario_role.destroy', ['role' => 'delivery', 'user' => $user->id]) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger mt-3">Eliminar Delivery</button>
                                        </form>
                                    </div>
                                @endif

                                @if ($user->hasRole('Comunario'))
                                    <div x-show="activeTab === 'comunario'">
                                        <form action="{{ route('admin.gestion_usuario_role.update', ['role' => 'comunario', 'user' => $user->id]) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <x-form.register-comunario :user="$user->comunario" :oldData="old()" />
                                            <button type="submit" class="btn btn-primary mt-3">Actualizar Comunario</button>
                                        </form>
                                        <!-- Botón para eliminar el rol de comunario -->
                                        <form action="{{ route('admin.gestion_usuario_role.destroy', ['role' => 'comunario', 'user' => $user->id]) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger mt-3">Eliminar Comunario</button>
                                        </form>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para agregar Administrador -->
    <div class="modal fade" id="adminModal" tabindex="-1" aria-labelledby="adminModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="adminModalLabel">Agregar Administrador</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.gestion_usuario_role.store', ['role' => 'admin', 'user' => $user->id]) }}" method="POST">
                        @csrf
                        <!-- Formulario para registrar Administrador -->
                        <x-form.register-admin :user="$user" :oldData="old()" />
                        <button type="submit" class="btn btn-primary mt-3">Agregar Administrador</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para agregar Comunario -->
    <div class="modal fade" id="comunarioModal" tabindex="-1" aria-labelledby="comunarioModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="comunarioModalLabel">Agregar Comunario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.gestion_usuario_role.store', ['role' => 'comunario', 'user' => $user->id]) }}" method="POST">
                        @csrf
                        <!-- Formulario para registrar Comunario -->
                        <x-form.register-comunario :user="$user" :oldData="old()" />
                        <button type="submit" class="btn btn-primary mt-3">Agregar Comunario</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para agregar Delivery -->
    <div class="modal fade" id="deliveryModal" tabindex="-1" aria-labelledby="deliveryModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deliveryModalLabel">Agregar Delivery</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.gestion_usuario_role.store', ['role' => 'delivery', 'user' => $user->id]) }}" method="POST">
                        @csrf
                        <!-- Formulario para registrar Delivery -->
                        <x-form.register-delivery :user="$user" :oldData="old()" />
                        <button type="submit" class="btn btn-primary mt-3">Agregar Delivery</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
</x-layouts.app-admin>
