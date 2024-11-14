{{-- Funcionalidad de Olvidé mi Contraseña --}} 
{{-- Esta página se accede desde la etiqueta <a> en front/users/login_register.blade.php --}}
@extends('front.layout.layout')

@section('content')
    <!-- Contenedor de Introducción a la Página -->
    <div class="page-style-a">
        <div class="container">
            <div class="page-intro">
                <h2>Cuenta</h2>
                <ul class="bread-crumb">
                    <li class="has-separator">
                        <i class="ion ion-md-home"></i>
                        <a href="index.html">Inicio</a>
                    </li>
                    <li class="is-marked">
                        <a href="account.html">Cuenta</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Contenedor de Introducción a la Página /- -->
    <!-- Página de Cuenta -->
    <div class="page-account u-s-p-t-80">
        <div class="container">

            {{-- Mostrando los Errores de Validación: https://laravel.com/docs/9.x/validation#quick-displaying-the-validation-errors AND https://laravel.com/docs/9.x/blade#validation-errors --}} 
            {{-- Determinando si un Elemento Existe en la Sesión (usando el método has()): https://laravel.com/docs/9.x/session#determining-if-an-item-exists-in-the-session --}}
            {{-- Nuestro mensaje de éxito de Bootstrap en caso de que la actualización de la contraseña del administrador sea exitosa: --}}
            {{-- Mostrando Mensaje de Éxito --}}
            @if (Session::has('success_message')) <!-- Verificar el método userRegister() en Front/UserController.php -->
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Éxito:</strong> {{ Session::get('success_message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            {{-- Mostrando Mensajes de Error --}}
            @if (Session::has('error_message')) <!-- Verificar el método userRegister() en Front/UserController.php -->
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error:</strong> {{ Session::get('error_message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            {{-- Mostrando Mensajes de Error --}}
            @if ($errors->any()) <!-- Verificar el método userRegister() en Front/UserController.php -->
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error:</strong> @php echo implode('', $errors->all('<div>:message</div>')); @endphp
                    <button type="button" class="close" data-dismiss="alert" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="row">

                <!-- Olvidé mi Contraseña -->
                <div class="col-lg-6">
                    <div class="login-wrapper">
                        <h2 class="account-h2 u-s-m-b-20">¿Olvidaste tu Contraseña?</h2>
                        <h6 class="account-h6 u-s-m-b-30">¡Bienvenido de nuevo! Inicia sesión en tu cuenta.</h6>

                        {{-- Nota: Para mostrar los Mensajes de Error de Validación del formulario (Mensajes de Error de Validación de Laravel) de la respuesta de la llamada AJAX del servidor (backend), creamos una etiqueta <p> después de cada campo <input> --}} 
                        {{-- Estructuramos y utilizamos un cierto patrón para que el patrón de id <p> deba ser como: delivery-x (por ejemplo, delivery-mobile, delivery-email, ... para que el bucle de jQuery funcione. Y x debe ser idéntico a los atributos HTML 'name' (por ejemplo, el <input> con el atributo HTML name='mobile' debe tener un <p> con un atributo HTML id    id="delivery-mobile"    ) para que cuando el array de errores de validación se envíe como respuesta desde el backend/servidor (ver $validator->messages()    dentro de    el método dentro del controlador) a la solicitud AJAX, puedan ser manejados de manera conveniente/fácil por el bucle jQuery $.each(). Ver front/js/custom.js) --}}
                        <p id="forgot-error"></p> {{-- si la Validación pasa / está bien pero las credenciales de inicio de sesión proporcionadas por el usuario son incorrectas, esto será usado por jQuery para mostrar un mensaje genérico de '¡Credenciales Incorrectas!'. O para mostrar un mensaje cuando la cuenta del usuario está inactiva/deshabilitada/desactivada --}}
                        <p id="forgot-success"></p> {{-- si la Validación pasa / está bien pero las credenciales de inicio de sesión proporcionadas por el usuario son incorrectas, esto será usado por jQuery para mostrar un mensaje genérico de '¡Credenciales Incorrectas!'. O para mostrar un mensaje cuando la cuenta del usuario está inactiva/deshabilitada/desactivada --}}
                        <form id="forgotForm" action="javascript:;" method="post"> {{-- Necesitamos desactivar el atributo 'action' HTML (usando    'javascript:;'    ) ya que vamos a enviar usando una llamada AJAX. Ver front/js/custom.js --}}
                            @csrf {{-- Previniendo Solicitudes CSRF: https://laravel.com/docs/9.x/csrf#preventing-csrf-requests --}}

                            <div class="u-s-m-b-30">
                                <label for="user-email">Email
                                    <span class="astk">*</span>
                                </label>
                                <input type="email" name="email" id="users-email" class="text-field" placeholder="Email" name="email">
                                <p id="forgot-email"></p> {{-- esto será usado por jQuery para mostrar los Mensajes de Error de Validación (Mensajes de Error de Validación de Laravel) de la respuesta de la llamada AJAX del servidor (backend) --}} 
                                {{-- El patrón debe ser como: register-x (por ejemplo, register-mobile, register-email, ... para que el bucle de jQuery funcione. Y x debe ser idéntico a los atributos HTML 'name' (por ejemplo, el <input> con el atributo HTML name='mobile' debe tener un <p> con un atributo HTML id    id="register-mobile"    ) para que cuando el array de errores de validación se envíe como respuesta desde el backend/servidor (ver $validator->messages()    dentro del método en el controlador) a la solicitud AJAX, puedan ser manejados de manera conveniente/fácil por el bucle jQuery $.each(). Ver front/js/custom.js) --}}
                            </div>
                            <div class="group-inline u-s-m-b-30">
                                <div class="group-2 text-right">
                                    <div class="page-anchor">
                                        <a href="{{ url('user/login-register') }}">
                                            <i class="fas fa-circle-o-notch u-s-m-r-9"></i>Volver a Iniciar Sesión
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="m-b-45">
                                <button type="submit" class="button button-outline-secondary w-100">Enviar</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Olvidé mi Contraseña /- -->

                <!-- Registro -->
                <div class="col-lg-6">
                    <div class="reg-wrapper">
                        <h2 class="account-h2 u-s-m-b-20">Registro</h2>
                        <h6 class="account-h6 u-s-m-b-30">Registrarse en este sitio te permite acceder al estado y historial de tus pedidos.</h6>

                        {{-- Mensaje de Éxito de Registro usando jQuery. Ver front/js/custom.js --}} 
                        <p id="register-success"></p>

                        <form id="registerForm" action="javascript:;" method="post"> {{-- Necesitamos desactivar el atributo 'action' HTML (usando    'javascript:;'    ) ya que vamos a enviar usando una llamada AJAX. Ver front/js/custom.js --}}
                            @csrf {{-- Previniendo Solicitudes CSRF: https://laravel.com/docs/9.x/csrf#preventing-csrf-requests --}}

                            <div class="u-s-m-b-30">
                                <label for="username">Nombre
                                    <span class="astk">*</span>
                                </label>
                                <input type="text" id="user-name" class="text-field" placeholder="Nombre de Usuario" name="name">
                                <p id="register-name"></p> {{-- esto será usado por jQuery para mostrar los Mensajes de Error de Validación (Mensajes de Error de Validación de Laravel) de la respuesta de la llamada AJAX del servidor (backend) --}} 
                                {{-- El patrón debe ser como: register-x (por ejemplo, register-mobile, register-email, ... para que el bucle de jQuery funcione. Y x debe ser idéntico a los atributos HTML 'name' (por ejemplo, el <input> con el atributo HTML name='mobile' debe tener un <p> con un atributo HTML id    id="register-mobile"    ) para que cuando el array de errores de validación se envíe como respuesta desde el backend/servidor (ver $validator->messages()    dentro del método en el controlador) a la solicitud AJAX, puedan ser manejados de manera conveniente/fácil por el bucle jQuery $.each(). Ver front/js/custom.js) --}}
                            </div>
                            <div class="u-s-m-b-30">
                                <label for="email">Email
                                    <span class="astk">*</span>
                                </label>
                                <input type="email" id="register-email" class="text-field" placeholder="Email" name="email">
                                <p id="register-email"></p> {{-- esto será usado por jQuery para mostrar los Mensajes de Error de Validación (Mensajes de Error de Validación de Laravel) de la respuesta de la llamada AJAX del servidor (backend) --}} 
                                {{-- El patrón debe ser como: register-x (por ejemplo, register-mobile, register-email, ... para que el bucle de jQuery funcione. Y x debe ser idéntico a los atributos HTML 'name' (por ejemplo, el <input> con el atributo HTML name='mobile' debe tener un <p> con un atributo HTML id    id="register-mobile"    ) para que cuando el array de errores de validación se envíe como respuesta desde el backend/servidor (ver $validator->messages()    dentro del método en el controlador) a la solicitud AJAX, puedan ser manejados de manera conveniente/fácil por el bucle jQuery $.each(). Ver front/js/custom.js) --}}
                            </div>
                            <div class="u-s-m-b-30">
                                <label for="mobile">Teléfono
                                    <span class="astk">*</span>
                                </label>
                                <input type="text" id="register-mobile" class="text-field" placeholder="Teléfono" name="mobile">
                                <p id="register-mobile"></p> {{-- esto será usado por jQuery para mostrar los Mensajes de Error de Validación (Mensajes de Error de Validación de Laravel) de la respuesta de la llamada AJAX del servidor (backend) --}} 
                                {{-- El patrón debe ser como: register-x (por ejemplo, register-mobile, register-email, ... para que el bucle de jQuery funcione. Y x debe ser idéntico a los atributos HTML 'name' (por ejemplo, el <input> con el atributo HTML name='mobile' debe tener un <p> con un atributo HTML id    id="register-mobile"    ) para que cuando el array de errores de validación se envíe como respuesta desde el backend/servidor (ver $validator->messages()    dentro del método en el controlador) a la solicitud AJAX, puedan ser manejados de manera conveniente/fácil por el bucle jQuery $.each(). Ver front/js/custom.js) --}}
                            </div>
                            <div class="u-s-m-b-30">
                                <label for="password">Contraseña
                                    <span class="astk">*</span>
                                </label>
                                <input type="password" id="register-password" class="text-field" placeholder="Contraseña" name="password">
                                <p id="register-password"></p> {{-- esto será usado por jQuery para mostrar los Mensajes de Error de Validación (Mensajes de Error de Validación de Laravel) de la respuesta de la llamada AJAX del servidor (backend) --}} 
                                {{-- El patrón debe ser como: register-x (por ejemplo, register-mobile, register-email, ... para que el bucle de jQuery funcione. Y x debe ser idéntico a los atributos HTML 'name' (por ejemplo, el <input> con el atributo HTML name='mobile' debe tener un <p> con un atributo HTML id    id="register-mobile"    ) para que cuando el array de errores de validación se envíe como respuesta desde el backend/servidor (ver $validator->messages()    dentro del método en el controlador) a la solicitud AJAX, puedan ser manejados de manera conveniente/fácil por el bucle jQuery $.each(). Ver front/js/custom.js) --}}
                            </div>
                            <div class="u-s-m-b-30">
                                <label for="confirm-password">Confirmar Contraseña
                                    <span class="astk">*</span>
                                </label>
                                <input type="password" id="register-confirm-password" class="text-field" placeholder="Confirmar Contraseña" name="confirm-password">
                                <p id="register-confirm-password"></p> {{-- esto será usado por jQuery para mostrar los Mensajes de Error de Validación (Mensajes de Error de Validación de Laravel) de la respuesta de la llamada AJAX del servidor (backend) --}} 
                                {{-- El patrón debe ser como: register-x (por ejemplo, register-mobile, register-email, ... para que el bucle de jQuery funcione. Y x debe ser idéntico a los atributos HTML 'name' (por ejemplo, el <input> con el atributo HTML name='mobile' debe tener un <p> con un atributo HTML id    id="register-mobile"    ) para que cuando el array de errores de validación se envíe como respuesta desde el backend/servidor (ver $validator->messages()    dentro del método en el controlador) a la solicitud AJAX, puedan ser manejados de manera conveniente/fácil por el bucle jQuery $.each(). Ver front/js/custom.js) --}}
                            </div>
                            <div class="m-b-45">
                                <button type="submit" class="button button-outline-secondary w-100">Registrar</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Registro /- -->
            </div>
        </div>
    </div>
    <!-- Página de Cuenta /- -->
@endsection
