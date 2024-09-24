<x-layouts.app-admin>

<div class="container">
    <div class="row">
        <div class="col">
            <h2>Datos</h2>
            <form action="{{route('admin.gestion_delivery.update',$delivery->user_id)}}" method="post">
                @csrf
                @method('PUT')
                <x-form.register-delivery :user="$delivery"/>
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </form>
        </div>
        <div class="col">
            <div x-data="{ activeTab: 'entregas' }">
                <!-- Nav Tabs -->
                <div class="col">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link" :class="{ 'active': activeTab === 'entregas' }" href="#" @click.prevent="activeTab = 'entregas'">Entregas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" :class="{ 'active': activeTab === 'devoluciones' }" href="#" @click.prevent="activeTab = 'devoluciones'">Devoluciones</a>
                        </li>
                    </ul>
                </div>

                <!-- Tab Content -->
                <div class="tab-content mt-4">
                    <!-- Tabla de Entregas -->
                    <div x-show="activeTab === 'entregas'">
                        <h3>Tabla de Entregas</h3>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Producto</th>
                                    <th>Fecha de Entrega</th>
                                    <th>Cantidad</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Producto A</td>
                                    <td>2024-01-15</td>
                                    <td>10</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Producto B</td>
                                    <td>2024-02-10</td>
                                    <td>5</td>
                                </tr>
                                <!-- Más filas -->
                            </tbody>
                        </table>
                    </div>

                    <!-- Tabla de Devoluciones -->
                    <div x-show="activeTab === 'devoluciones'">
                        <h3>Tabla de Devoluciones</h3>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Producto</th>
                                    <th>Fecha de Devolución</th>
                                    <th>Cantidad</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Producto C</td>
                                    <td>2024-03-01</td>
                                    <td>2</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Producto D</td>
                                    <td>2024-04-15</td>
                                    <td>1</td>
                                </tr>
                                <!-- Más filas -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>


    </div>
</div>
<script src="//unpkg.com/alpinejs" defer></script>

</x-layouts.app-admin>
