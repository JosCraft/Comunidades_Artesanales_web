@vite(['resources/css/sidebarAdmin.css',])
<div class="sideadmin ">
    <div class="">
        <ul class="">
            <li class="nav-item">
                <a href="{{ route('admin') }}" class="nav-link">
                    Menu
                </a>
            </li>
            <li>
                <a href="{{ route('admin.gestion_usuario') }}" class="nav-link px-0 align-middle">
                    <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline">Gestion Usuarios</span>
                 </a>
            </li>
            <li>
                <a href="{{ route('admin.gestion_comunidad') }}" class="nav-link px-0 align-middle">
                    <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline">Gestionar Deliverys</span></a>
            </li>
            <li>
                <a href="{{route('admin.gestion_productos')}}"  class="nav-link px-0 align-middle">
                    <i class="fs-4 bi-bootstrap"></i> <span class="ms-1 d-none d-sm-inline">Productos</span>
                </a>
            </li>
            <li>
                <a href="#" class="nav-link px-0 align-middle">
                    <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline">Gestionar Reseñas</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.gestion_comunidad') }}" class="nav-link px-0 align-middle">
                    <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline">Gestionar Comunidades</span>
                </a>
            </li>
        </ul>

    </div>
</div>
