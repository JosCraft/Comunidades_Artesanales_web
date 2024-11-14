{{-- This page is accessed from Customer Login tab in the dropdown menu in the header (in front/layout/header.blade.php) --}} 
@extends('front.layout.layout')


@section('content')
    <!-- Page Introduction Wrapper -->
    <div class="page-style-a">
        <div class="container">
            <div class="page-intro">
                <h2>Account</h2>
                <ul class="bread-crumb">
                    <li class="has-separator">
                        <i class="ion ion-md-home"></i>
                        <a href="index.html">Home</a>
                    </li>
                    <li class="is-marked">
                        <a href="account.html">Account</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Page Introduction Wrapper /- -->
    <!-- Account-Page -->
    <div class="page-account u-s-p-t-80">
        <div class="container">


        {{-- Mostrando los errores de validación: https://laravel.com/docs/9.x/validation#quick-displaying-the-validation-errors Y https://laravel.com/docs/9.x/blade#validation-errors --}}
        {{-- Determinando si un ítem existe en la sesión (usando el método has()): https://laravel.com/docs/9.x/session#determining-if-an-item-exists-in-the-session --}}
        {{-- Nuestro mensaje de éxito de Bootstrap en caso de que la actualización de la contraseña del administrador sea exitosa: --}}
        {{-- Mostrando mensaje de éxito --}}
        @if (Session::has('success_message')) <!-- Ver método userRegister() en Front/UserController.php -->
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Éxito:</strong> {{ Session::get('success_message') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        {{-- Mostrando mensajes de error --}}
        @if (Session::has('error_message')) <!-- Ver método userRegister() en Front/UserController.php -->
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error:</strong> {{ Session::get('error_message') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        {{-- Mostrando mensajes de error --}}
        @if ($errors->any()) <!-- Ver método userRegister() en Front/UserController.php -->
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error:</strong> @php echo implode('', $errors->all('<div>:message</div>')); @endphp
                <button type="button" class="close" data-dismiss="alert" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif



            <div class="row">
              <!-- Iniciar Sesión -->
<div class="col-lg-6">
    <div class="login-wrapper">
        <h2 class="account-h2 u-s-m-b-20">Iniciar Sesión</h2>
        <h6 class="account-h6 u-s-m-b-30">¡Bienvenido de nuevo! Inicia sesión en tu cuenta.</h6>

        {{-- Nota: Para mostrar los mensajes de error de validación del formulario (Mensajes de error de validación de Laravel) de la respuesta de la llamada AJAX desde el servidor (backend), creamos una etiqueta <p> después de cada campo <input> --}}
        {{-- Estructuramos y utilizamos un cierto patrón para que el patrón de <p> id deba ser como: delivery-x (por ejemplo, delivery-móvil, delivery-email, ... para que funcione el bucle de jQuery. Y x debe ser idéntico a los atributos HTML 'name' (por ejemplo, el <input> con el atributo HTML name='mobile' debe tener un <p> con un atributo HTML id    id="delivery-mobile") para que cuando el array de errores de validación se envíe como respuesta desde el backend/servidor (ver $validator->messages() dentro del método en el controlador) a la solicitud AJAX, puedan ser manejados de manera conveniente/fácil por el bucle jQuery $.each(). Ver front/js/custom.js) --}}
        <p id="login-error"></p> {{-- si la validación pasa / está bien pero las credenciales de inicio de sesión proporcionadas por el usuario son incorrectas, esto será utilizado por jQuery para mostrar un mensaje genérico de '¡Credenciales Incorrectas!'. O para mostrar un mensaje cuando la cuenta del usuario está inactiva/deshabilitada/desactivada --}}
        <form id="loginForm" action="javascript:;" method="post"> {{-- Necesitamos desactivar el atributo HTML 'action' (usando 'javascript:;') ya que vamos a enviar usando una llamada AJAX. Ver front/js/custom.js --}}
            @csrf {{-- Prevención de solicitudes CSRF: https://laravel.com/docs/9.x/csrf#preventing-csrf-requests --}}

            <div class="u-s-m-b-30">
                <label for="user-email">Correo Electrónico
                    <span class="astk">*</span>
                </label>
                <input type="email" name="email" id="users-email" class="text-field" placeholder="Correo Electrónico" name="email">
                <p id="login-email"></p> {{-- esto será utilizado por jQuery para mostrar los mensajes de error de validación (Mensajes de error de validación de Laravel) de la respuesta de la llamada AJAX desde el servidor (backend) --}}
                {{-- El patrón debe ser como: register-x (por ejemplo, register-móvil, register-email, ... para que funcione el bucle jQuery. Y x debe ser idéntico a los atributos HTML 'name' (por ejemplo, el <input> con el atributo HTML name='mobile' debe tener un <p> con un atributo HTML id id="register-mobile") para que cuando el array de errores de validación se envíe como respuesta desde el backend/servidor (ver $validator->messages() dentro del método en el controlador) a la solicitud AJAX, puedan ser manejados de manera conveniente/fácil por el bucle jQuery $.each(). Ver front/js/custom.js) --}}
            </div>
            <div class="u-s-m-b-30">
                <label for="user-password">Contraseña
                    <span class="astk">*</span>
                </label>
                <input type="password" name="password" id="users-password" class="text-field" placeholder="Contraseña" name="password">
                <p id="login-password"></p> {{-- esto será utilizado por jQuery para mostrar los mensajes de error de validación (Mensajes de error de validación de Laravel) de la respuesta de la llamada AJAX desde el servidor (backend) --}}
                {{-- El patrón debe ser como: register-x (por ejemplo, register-móvil, register-email, ... para que funcione el bucle jQuery. Y x debe ser idéntico a los atributos HTML 'name' (por ejemplo, el <input> con el atributo HTML name='mobile' debe tener un <p> con un atributo HTML id id="register-mobile") para que cuando el array de errores de validación se envíe como respuesta desde el backend/servidor (ver $validator->messages() dentro del método en el controlador) a la solicitud AJAX, puedan ser manejados de manera conveniente/fácil por el bucle jQuery $.each(). Ver front/js/custom.js) --}}
            </div>

            <div class="group-inline u-s-m-b-30">
                {{-- Funcionalidad "Recordar Me" --}}
                {{-- <div class="group-1">
                    <input type="checkbox" class="check-box" id="remember-me-token">
                    <label class="label-text" for="remember-me-token">Recordarme</label>
                </div> --}}

                {{-- Funcionalidad de "¿Olvidaste tu contraseña?" --}} 
                <div class="group-2 text-right">
                    <div class="page-anchor">
                        <a href="{{ url('user/forgot-password') }}">
                            <i class="fas fa-circle-o-notch u-s-m-r-9"></i>¿Perdiste tu contraseña?
                        </a>
                    </div>
                </div>
            </div>

            <div class="m-b-45">
                <button class="button button-outline-secondary w-100">Iniciar Sesión</button>
            </div>
        </form>
    </div>
</div>
<!-- Iniciar Sesión /- -->




                <!-- Registro -->
<div class="col-lg-6">
    <div class="reg-wrapper">
        <h2 class="account-h2 u-s-m-b-20">Registro</h2>
        <h6 class="account-h6 u-s-m-b-30">Registrarse en este sitio te permite acceder al estado y la historia de tus pedidos.</h6>

        {{-- Mensaje de éxito en el registro utilizando jQuery. Ver front/js/custom.js --}} 
        {{-- <p id="register-success" style="color: green"></p> --}}
        <p id="register-success"></p>

        <form id="registerForm" action="javascript:;" method="post"> {{-- Necesitamos desactivar el atributo 'action' HTML (usando 'javascript:;') ya que vamos a enviar usando una llamada AJAX. Ver front/js/custom.js --}}
            @csrf {{-- Previniendo solicitudes CSRF: https://laravel.com/docs/9.x/csrf#preventing-csrf-requests --}}

            <div class="u-s-m-b-30">
                <label for="username">Nombre
                    <span class="astk">*</span>
                </label>
                <input type="text" id="user-name" class="text-field" placeholder="Nombre de Usuario" name="name">
                {{-- <p id="register-name" style="color: red"></p> --}} {{-- Esto será utilizado por jQuery para mostrar los mensajes de error de validación (mensajes de error de validación de Laravel) de la respuesta de la llamada AJAX desde el servidor (backend) --}} 
                {{-- El patrón debe ser así: register-x (por ejemplo, register-mobile, register-email, ... para que el bucle de jQuery funcione. Y x debe ser idéntico a los atributos 'name' HTML (por ejemplo, el <input> con el atributo HTML name='mobile' debe tener un <p> con un id HTML id="register-mobile") para que cuando el array de errores de validación se envíe como respuesta desde el backend/servidor (ver $validator->messages() dentro del método del controlador) a la solicitud AJAX, puedan ser manejados fácilmente por el bucle $.each() de jQuery. Ver front/js/custom.js) --}}
                <p id="register-name"></p> {{-- Esto será utilizado por jQuery para mostrar los mensajes de error de validación (mensajes de error de validación de Laravel) de la respuesta de la llamada AJAX desde el servidor (backend) --}}
            </div>
            <div class="u-s-m-b-30">
                <label for="usermobile">Móvil
                    <span class="astk">*</span>
                </label>
                <input type="text" id="user-mobile" class="text-field" placeholder="Móvil de Usuario" name="mobile">
                {{-- <p id="register-mobile" style="color: red"></p> --}} {{-- Esto será utilizado por jQuery para mostrar los mensajes de error de validación (mensajes de error de validación de Laravel) de la respuesta de la llamada AJAX desde el servidor (backend) --}}
                <p id="register-mobile"></p> {{-- Esto será utilizado por jQuery para mostrar los mensajes de error de validación (mensajes de error de validación de Laravel) de la respuesta de la llamada AJAX desde el servidor (backend) --}}
            </div>
            <div class="u-s-m-b-30">
                <label for="useremail">Correo Electrónico
                    <span class="astk">*</span>
                </label>
                <input type="email" id="user-email" class="text-field" placeholder="Correo Electrónico de Usuario" name="email">
                {{-- <p id="register-email" style="color: red"></p> --}} {{-- Esto será utilizado por jQuery para mostrar los mensajes de error de validación (mensajes de error de validación de Laravel) de la respuesta de la llamada AJAX desde el servidor (backend) --}}
                <p id="register-email"></p> {{-- Esto será utilizado por jQuery para mostrar los mensajes de error de validación (mensajes de error de validación de Laravel) de la respuesta de la llamada AJAX desde el servidor (backend) --}}
            </div>
            <div class="u-s-m-b-30">
                <label for="userpassword">Contraseña
                    <span class="astk">*</span>
                </label>
                <input type="password" id="user-password" class="text-field" placeholder="Contraseña de Usuario" name="password">
                {{-- <p id="register-password" style="color: red"></p> --}} {{-- Esto será utilizado por jQuery para mostrar los mensajes de error de validación (mensajes de error de validación de Laravel) de la respuesta de la llamada AJAX desde el servidor (backend) --}}
                <p id="register-password"></p> {{-- Esto será utilizado por jQuery para mostrar los mensajes de error de validación (mensajes de error de validación de Laravel) de la respuesta de la llamada AJAX desde el servidor (backend) --}}
            </div>
            <div class="u-s-m-b-30"> {{-- Checkbox "He leído y acepto los términos y condiciones" --}}
                <input type="checkbox" class="check-box" id="accept" name="accept">
                <label class="label-text no-color" for="accept">He leído y acepto los
                    <a href="terms-and-conditions.html" class="u-c-brand">términos y condiciones</a>
                </label>
                {{-- <p id="register-accept" style="color: red"></p> --}} {{-- Esto será utilizado por jQuery para mostrar los mensajes de error de validación (mensajes de error de validación de Laravel) de la respuesta de la llamada AJAX desde el servidor (backend) --}}
            </div>
           

                            <div class="u-s-m-b-45">
                                <button class="button button-primary w-100">Register</button>
                            </div>
        </form>
    </div>
</div>

            </div>
        </div>
    </div>
    <!-- Account-Page /- -->
@endsection