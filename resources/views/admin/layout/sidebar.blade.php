{{-- Correcting issues in the Skydash Admin Panel Sidebar using Session --}}

<!-- Comunidad_Artesanal\resources\views\admin\layout\sidebar.blade.php-->
<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a @if (Session::get('page') == 'dashboard') style="background: #052CA3 !important; color: #FFF !important" @endif class="nav-link" href="{{ url('admin/dashboard') }}">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Panel</span>
            </a>
        </li>



        {{-- In case the authenticated user (the logged-in user) (using the 'admin' Authentication Guard in auth.php) type is 'vendor' --}}
        @if (Auth::guard('admin')->user()->type == 'vendor') {{-- Accessing Specific Guard Instances: https://laravel.com/docs/9.x/authentication#accessing-specific-guard-instances --}}
            <li class="nav-item">
                <a @if (Session::get('page') == 'update_personal_details' || Session::get('page') == 'update_business_details' || Session::get('page') == 'update_bank_details') style="background: #052CA3 !important; color: #FFF !important" @endif class="nav-link" data-toggle="collapse" href="#ui-vendors" aria-expanded="false" aria-controls="ui-vendors">
                    <i class="icon-layout menu-icon"></i>
                    <span class="menu-title">Detalles del Vendedor</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-vendors">
                    <ul class="nav flex-column sub-menu" style="background: #fff !important; color: #052CA3 !important">
                        <li class="nav-item"> <a @if (Session::get('page') == 'update_personal_details') style="background: #052CA3 !important; color: #FFF !important" @else style="background: #fff !important; color: #052CA3 !important" @endif class="nav-link" href="{{ url('admin/update-vendor-details/personal') }}">Detalles Personales</a></li>
                        <li class="nav-item"> <a @if (Session::get('page') == 'update_business_details') style="background: #052CA3 !important; color: #FFF !important" @else style="background: #fff !important; color: #052CA3 !important" @endif class="nav-link" href="{{ url('admin/update-vendor-details/business') }}">Detalles del Negocio</a></li>
                        <li class="nav-item"> <a @if (Session::get('page') == 'update_bank_details') style="background: #052CA3 !important; color: #FFF !important" @else style="background: #fff !important; color: #052CA3 !important" @endif class="nav-link" href="{{ url('admin/update-vendor-details/bank') }}">Detalles Bancarios</a></li>
                    </ul>
                </div>
            </li>
            {{-- se cambio-----------------------------------------------------------------}}
            <li class="nav-item">
                <a @if (Session::get('page') == 'sections' || Session::get('page') == 'categories' || Session::get('page') == 'products' || Session::get('page') == 'brands' || Session::get('page') == 'filters' || Session::get('page') == 'coupons') style="background: #052CA3 !important; color: #FFF !important" @endif class="nav-link" data-toggle="collapse" href="#ui-catalogue" aria-expanded="false" aria-controls="ui-catalogue">
                    <i class="icon-layout menu-icon"></i>
                    <span class="menu-title">Gestión de Catálogo</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-catalogue">
                    <ul class="nav flex-column sub-menu" style="background: #fff !important; color: #052CA3 !important">
                        <li class="nav-item"> <a @if (Session::get('page') == 'products') style="background: #052CA3 !important; color: #FFF !important" @else style="background: #fff !important; color: #052CA3 !important" @endif class="nav-link" href="{{ url('admin/products') }}">Productos</a></li>
                        <li class="nav-item"> <a @if (Session::get('page') == 'coupons') style="background: #052CA3 !important; color: #FFF !important" @else style="background: #fff !important; color: #052CA3 !important" @endif class="nav-link" href="{{ url('admin/coupons') }}">Cupones</a></li> 
                    </ul>
                </div>
            </li>
            {{-- se cambio-----------------------------------------------------------------}}
            {{-- Si el usuario autenticado/iniciado sesión es 'vendedor', muestra SOLO los pedidos de los productos añadidos por ese 'vendedor' específico (En contraste con el caso en que el usuario autenticado/iniciado sesión es 'administrador', mostramos TODOS los pedidos) --}}
            <li class="nav-item">
                <a @if (Session::get('page') == 'orders') style="background: #052CA3 !important; color: #FFF !important" @endif class="nav-link" data-toggle="collapse" href="#ui-orders" aria-expanded="false" aria-controls="ui-orders">
                    <i class="icon-layout menu-icon"></i>
                    <span class="menu-title">Gestión de Pedidos</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-orders">
                    <ul class="nav flex-column sub-menu" style="background: #fff !important; color: #052CA3 !important">
                        <li class="nav-item"> <a @if (Session::get('page') == 'orders') style="background: #052CA3 !important; color: #FFF !important" @else style="background: #fff !important; color: #052CA3 !important" @endif class="nav-link" href="{{ url('admin/orders') }}">Pedidosss</a></li>
                    </ul>
                    <ul class="nav flex-column sub-menu" style="background: #fff !important; color: #052CA3 !important">
                        <li class="nav-item"> <a @if (Session::get('page') == 'sales') style="background: #052CA3 !important; color: #FFF !important" @else style="background: #fff !important; color: #052CA3 !important" @endif class="nav-link" href="{{ url('admin/sales') }}">Ventas</a></li>
<<<<<<< HEAD
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a @if (Session::get('page') == 'ratings') style="background: #052CA3 !important; color: #FFF !important" @endif class="nav-link" data-toggle="collapse" href="#ui-ratings" aria-expanded="false" aria-controls="ui-ratings">
                    <i class="icon-layout menu-icon"></i>
                    <span class="menu-title">Gestión de Calificaciones</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-ratings">
                    <ul class="nav flex-column sub-menu" style="background: #fff !important; color: #052CA3 !important">
                        <li class="nav-item"> 
                            <a @if (Session::get('page') == 'ratings') style="background: #052CA3 !important; color: #FFF !important" @else style="background: #fff !important; color: #052CA3 !important" @endif class="nav-link" href="{{ url('admin/ratings') }}">Calificaciones y Reseñas de Productos</a>
                        </li>
=======
>>>>>>> 2d6b2f34a724724e2a0ff21a1a1fb205e357852e
                    </ul>
                </div>
            </li>


        @else {{-- In case the authenticated user (the logged-in user) (using the 'admin' Authentication Guard in auth.php) type is 'superadmin', or 'admin', or 'subadmin' --}}

            <li class="nav-item">
                <a @if (Session::get('page') == 'update_admin_password' || Session::get('page') == 'update_admin_details') style="background: #052CA3 !important; color: #FFF !important" @endif class="nav-link" data-toggle="collapse" href="#ui-settings" aria-expanded="false" aria-controls="ui-settings">
                    <i class="icon-layout menu-icon"></i>
                    <span class="menu-title">Configuraciones</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-settings">
                    <ul class="nav flex-column sub-menu" style="background: #fff !important; color: #052CA3 !important">
                        <li class="nav-item"> <a @if (Session::get('page') == 'update_admin_password') style="background: #052CA3 !important; color: #FFF !important" @else style="background: #fff !important; color: #052CA3 !important" @endif class="nav-link" href="{{ url('admin/update-admin-password') }}">Actualizar Contraseña de Administrador</a></li>
                        <li class="nav-item"> <a @if (Session::get('page') == 'update_admin_details') style="background: #052CA3 !important; color: #FFF !important" @else style="background: #fff !important; color: #052CA3 !important" @endif class="nav-link" href="{{ url('admin/update-admin-details') }}">Actualizar Datos de Administrador</a></li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a @if (Session::get('page') == 'view_admins' || Session::get('page') == 'view_subadmins' || Session::get('page') == 'view_vendors' || Session::get('page') == 'view_all') style="background: #052CA3 !important; color: #FFF !important" @endif class="nav-link" data-toggle="collapse" href="#ui-admins" aria-expanded="false" aria-controls="ui-admins">
                    <i class="icon-layout menu-icon"></i>
                    <span class="menu-title">Gestión de Administradores</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-admins">
                    <ul class="nav flex-column sub-menu" style="background: #fff !important; color: #052CA3 !important">
                        <li class="nav-item"> <a @if (Session::get('page') == 'view_admins') style="background: #052CA3 !important; color: #FFF !important" @else style="background: #fff !important; color: #052CA3 !important" @endif class="nav-link" href="{{ url('admin/admins/admin') }}">Administradores</a></li>
                        <li class="nav-item"> <a @if (Session::get('page') == 'view_subadmins') style="background: #052CA3 !important; color: #FFF !important" @else style="background: #fff !important; color: #052CA3 !important" @endif class="nav-link" href="{{ url('admin/admins/subadmin') }}">Subadministradores</a></li>
                        <li class="nav-item"> <a @if (Session::get('page') == 'view_vendors') style="background: #052CA3 !important; color: #FFF !important" @else style="background: #fff !important; color: #052CA3 !important" @endif class="nav-link" href="{{ url('admin/admins/vendor') }}">Vendedores</a></li>
                        <li class="nav-item"> <a @if (Session::get('page') == 'view_all') style="background: #052CA3 !important; color: #FFF !important" @else style="background: #fff !important; color: #052CA3 !important" @endif class="nav-link" href="{{ url('admin/admins') }}">Todos</a></li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a @if (Session::get('page') == 'sections' || Session::get('page') == 'categories' || Session::get('page') == 'products' || Session::get('page') == 'brands' || Session::get('page') == 'filters' || Session::get('page') == 'coupons') style="background: #052CA3 !important; color: #FFF !important" @endif class="nav-link" data-toggle="collapse" href="#ui-catalogue" aria-expanded="false" aria-controls="ui-catalogue">
                    <i class="icon-layout menu-icon"></i>
                    <span class="menu-title">Gestión de Catálogo</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-catalogue">
                    <ul class="nav flex-column sub-menu" style="background: #fff !important; color: #052CA3 !important">
                        <li class="nav-item"> <a @if (Session::get('page') == 'sections') style="background: #052CA3 !important; color: #FFF !important" @else style="background: #fff !important; color: #052CA3 !important" @endif class="nav-link" href="{{ url('admin/sections') }}">Secciones</a></li>
                        <li class="nav-item"> <a @if (Session::get('page') == 'categories') style="background: #052CA3 !important; color: #FFF !important" @else style="background: #fff !important; color: #052CA3 !important" @endif class="nav-link" href="{{ url('admin/categories') }}">Categorías</a></li>
                        <li class="nav-item"> <a @if (Session::get('page') == 'brands') style="background: #052CA3 !important; color: #FFF !important" @else style="background: #fff !important; color: #052CA3 !important" @endif class="nav-link" href="{{ url('admin/brands') }}">Marcas</a></li> 
                        <li class="nav-item"> <a @if (Session::get('page') == 'products') style="background: #052CA3 !important; color: #FFF !important" @else style="background: #fff !important; color: #052CA3 !important" @endif class="nav-link" href="{{ url('admin/products') }}">Productos</a></li>
                        <li class="nav-item"> <a @if (Session::get('page') == 'coupons') style="background: #052CA3 !important; color: #FFF !important" @else style="background: #fff !important; color: #052CA3 !important" @endif class="nav-link" href="{{ url('admin/coupons') }}">Cupones</a></li>
                        <li class="nav-item"> <a @if (Session::get('page') == 'filters') style="background: #052CA3 !important; color: #FFF !important" @else style="background: #fff !important; color: #052CA3 !important" @endif class="nav-link" href="{{ url('admin/filters') }}">Filtros</a></li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a @if (Session::get('page') == 'orders') style="background: #052CA3 !important; color: #FFF !important" @endif class="nav-link" data-toggle="collapse" href="#ui-orders" aria-expanded="false" aria-controls="ui-orders">
                    <i class="icon-layout menu-icon"></i>
                    <span class="menu-title">Gestión de Pedidos</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-orders">
                    <ul class="nav flex-column sub-menu" style="background: #fff !important; color: #052CA3 !important">
                        <li class="nav-item"> <a @if (Session::get('page') == 'orders') style="background: #052CA3 !important; color: #FFF !important" @else style="background: #fff !important; color: #052CA3 !important" @endif class="nav-link" href="{{ url('admin/orders') }}">Pedidos</a></li>
                    </ul>
                      <ul class="nav flex-column sub-menu" style="background: #fff !important; color: #052CA3 !important">
                        <li class="nav-item"> <a @if (Session::get('page') == 'sales') style="background: #052CA3 !important; color: #FFF !important" @else style="background: #fff !important; color: #052CA3 !important" @endif class="nav-link" href="{{ url('admin/sales') }}">Ventas</a></li>
                    </ul>
                </div>
            </li>


            <li class="nav-item">
                <a @if (Session::get('page') == 'ratings') style="background: #052CA3 !important; color: #FFF !important" @endif class="nav-link" data-toggle="collapse" href="#ui-ratings" aria-expanded="false" aria-controls="ui-ratings">
                    <i class="icon-layout menu-icon"></i>
                    <span class="menu-title">Gestión de Calificaciones</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-ratings">
                    <ul class="nav flex-column sub-menu" style="background: #fff !important; color: #052CA3 !important">
                        <li class="nav-item"> <a @if (Session::get('page') == 'ratings') style="background: #052CA3 !important; color: #FFF !important" @else style="background: #fff !important; color: #052CA3 !important" @endif class="nav-link" href="{{ url('admin/ratings') }}">Calificaciones y Reseñas de Productos</a></li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a @if (Session::get('page') == 'users' || Session::get('page') == 'subscribers') style="background: #052CA3 !important; color: #FFF !important" @endif class="nav-link" data-toggle="collapse" href="#ui-users" aria-expanded="false" aria-controls="ui-users">
                    <i class="icon-layout menu-icon"></i>
                    <span class="menu-title">Gestión de Usuarios</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-users">
                    <ul class="nav flex-column sub-menu" style="background: #fff !important; color: #052CA3 !important">
                        <li class="nav-item"> <a @if (Session::get('page') == 'users') style="background: #052CA3 !important; color: #FFF !important" @else style="background: #fff !important; color: #052CA3 !important" @endif class="nav-link" href="{{ url('admin/users') }}">Usuarios</a></li>
                        <li class="nav-item"> <a @if (Session::get('page') == 'subscribers') style="background: #052CA3 !important; color: #FFF !important" @else style="background: #fff !important; color: #052CA3 !important" @endif class="nav-link" href="{{ url('admin/subscribers') }}">Suscriptores</a></li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a @if (Session::get('page') == 'banners') style="background: #052CA3 !important; color: #FFF !important" @endif class="nav-link" data-toggle="collapse" href="#ui-banners" aria-expanded="false" aria-controls="ui-banners">
                    <i class="icon-layout menu-icon"></i>
                    <span class="menu-title">Gestión de Banners</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-banners">
                    <ul class="nav flex-column sub-menu" style="background: #fff !important; color: #052CA3 !important">
                        <li class="nav-item"> <a @if (Session::get('page') == 'banners') style="background: #052CA3 !important; color: #FFF !important" @else style="background: #fff !important; color: #052CA3 !important" @endif class="nav-link" href="{{ url('admin/banners') }}">Banners de la Página Principal</a></li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a @if (Session::get('page') == 'shipping') style="background: #052CA3 !important; color: #FFF !important" @endif class="nav-link" data-toggle="collapse" href="#ui-shipping" aria-expanded="false" aria-controls="ui-shipping">
                    <i class="icon-layout menu-icon"></i>
                    <span class="menu-title">Gestión de Envíos</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-shipping">
                    <ul class="nav flex-column sub-menu" style="background: #fff !important; color: #052CA3 !important">
                        <li class="nav-item"> <a @if (Session::get('page') == 'shipping') style="background: #052CA3 !important; color: #FFF !important" @else style="background: #fff !important; color: #052CA3 !important" @endif class="nav-link" href="{{ url('admin/shipping-charges') }}">Cargos de Envío</a></li>
                    </ul>
                </div>
            </li>


        @endif

    </ul>
</nav>