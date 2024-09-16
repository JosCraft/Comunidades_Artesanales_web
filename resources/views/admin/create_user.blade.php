<x-layouts.app-admin>
    <div class="container" x-data="{ activeTab: 'admin' }">
        <div class="row">
            <div class="col">
                <h1>Registrar Datos Usuario</h1>
                <form action="">
                    <x-form.register />
                    <button type="submit" class="btn btn-primary mt-3">Registrar Usuario</button>
                </form>
            </div>
            <div class="col">
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

                <!-- Formularios para cada rol con botón de envío -->
                <div class="tab-content">
                    <div x-show="activeTab === 'admin'">
                        <x-form.register-admin />
                        <button type="submit" class="btn btn-primary mt-3">Registrar Administrador</button>
                    </div>
                    <div x-show="activeTab === 'delivery'">
                        <x-form.register-delivery />
                        <button type="submit" class="btn btn-primary mt-3">Registrar Delivery</button>
                    </div>
                    <div x-show="activeTab === 'comunario'">
                        <x-form.register-comunario />
                        <button type="submit" class="btn btn-primary mt-3">Registrar Comunario</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="//unpkg.com/alpinejs" defer></script>

</x-layouts.app-admin>
