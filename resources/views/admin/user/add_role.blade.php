<x-layouts.app-admin>
    <div class="container" x-data="{ activeTab: 'admin' }">
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
            <!-- Tabs y formularios para roles -->
            <div class="">
                <p>{{$user->id}}</p>
                <h1>Registrar Como</h1>
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a
                          class="nav-link"
                          :class="{ 'active': activeTab === 'admin' }"
                          href="#"
                          @click.prevent="activeTab = 'admin'"
                        >
                          Administrador
                        </a>
                    </li>
                    <li class="nav-item">
                        <a
                          class="nav-link"
                          :class="{ 'active': activeTab === 'delivery' }"
                          href="#"
                          @click.prevent="activeTab = 'delivery'"
                        >
                          Delivery
                        </a>
                    </li>
                    <li class="nav-item">
                        <a
                          class="nav-link"
                          :class="{ 'active': activeTab === 'comunario' }"
                          href="#"
                          @click.prevent="activeTab = 'comunario'"
                        >
                          Comunario
                        </a>
                    </li>
                </ul>

                <!-- Formularios para cada rol -->
                <div class="tab-content">
                    <div x-show="activeTab === 'admin'">
                        <x-form.register-admin :oldData="old()" />
                        <button type="submit" class="btn btn-primary mt-3">Registrar Administrador</button>
                    </div>
                    <div x-show="activeTab === 'delivery'">
                        <x-form.register-delivery :oldData="old()" />
                        <button type="submit" class="btn btn-primary mt-3">Registrar Delivery</button>
                    </div>
                    <div x-show="activeTab === 'comunario'">
                        <x-form.register-comunario :oldData="old()" />
                        <button type="submit" class="btn btn-primary mt-3">Registrar Comunario</button>
                    </div>
                </div>
            </div>
            <script src="//unpkg.com/alpinejs" defer></script>
</x-layouts.app-admin>
