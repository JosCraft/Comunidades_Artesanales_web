<x-layouts.app-admin>
@vite(['resources/css/style_dashboard.css',])


    <div class="dashboard container mx-auto">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Panel de Administración') }}
        </h2>
        <div class="row justify-content-center">

            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">

                <!-- Usuarios Card -->
                <div class="col">
                    <div class="card border-info h-100">
                        <div class="card-body">
                            <h5 class="card-title">Usuarios</h5>
                            <p class="card-text">Gestiona los usuarios registrados en la plataforma, sus permisos y roles.</p>
                        </div>
                        <div class="card-footer bg-transparent border-info">
                            <a href="{{ route('admin.gestion_usuario') }}" class="btn btn-outline-info w-100">Ir a Usuarios</a>
                        </div>
                    </div>
                </div>

                <!-- Comunarios Card -->
                <div class="col">
                    <div class="card border-success h-100">
                        <div class="card-body">
                            <h5 class="card-title">Comunarios</h5>
                            <p class="card-text">Administra los comunarios, sus productos y la relación con sus comunidades.</p>
                        </div>
                        <div class="card-footer bg-transparent border-success">
                            <a href="{{ route('admin.gestion_comunario') }}" class="btn btn-outline-success w-100">Ir a Comunarios</a>
                        </div>
                    </div>
                </div>

                <!-- Deliverys Card -->
                <div class="col">
                    <div class="card border-warning h-100">
                        <div class="card-body">
                            <h5 class="card-title">Deliverys</h5>
                            <p class="card-text">Gestiona los servicios de entrega y monitorea las órdenes realizadas.</p>
                        </div>
                        <div class="card-footer bg-transparent border-warning">
                            <a href="#" class="btn btn-outline-warning w-100">Ir a Deliverys</a>
                        </div>
                    </div>
                </div>

                <!-- Productos Card -->
                <div class="col">
                    <div class="card border-danger h-100">
                        <div class="card-body">
                            <h5 class="card-title">Productos</h5>
                            <p class="card-text">Gestiona los productos de los comunarios, sus detalles y disponibilidad.</p>
                        </div>
                        <div class="card-footer bg-transparent border-danger">
                            <a href="{{ route('admin.gestion_productos') }}" class="btn btn-outline-danger w-100">Ir a Productos</a>
                        </div>
                    </div>
                </div>

                <!-- Reseñas Card -->
                <div class="col">
                    <div class="card border-primary h-100">
                        <div class="card-body">
                            <h5 class="card-title">Reseñas</h5>
                            <p class="card-text">Administra las reseñas y valoraciones que los usuarios han dejado sobre los productos y servicios.</p>
                        </div>
                        <div class="card-footer bg-transparent border-primary">
                            <a href="#" class="btn btn-outline-primary w-100">Ir a Reseñas</a>
                        </div>
                    </div>
                </div>

                <!-- Comunidades Card -->
                <div class="col">
                    <div class="card border-secondary h-100">
                        <div class="card-body">
                            <h5 class="card-title">Comunidades</h5>
                            <p class="card-text">Gestiona las comunidades a las que pertenecen los comunarios y su interacción con la plataforma.</p>
                        </div>
                        <div class="card-footer bg-transparent border-secondary">
                            <a href="{{ route('admin.gestion_comunidad') }}" class="btn btn-outline-secondary w-100">Ir a Comunidades</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</x-layouts.app-admin>
