{{-- Esta página se 'incluye' en front/products/checkout.blade.php y será utilizada por jQuery AJAX para recargarla, verificar front/js/custom.js --}}

<!-- Campos del formulario /- -->
<h4 class="section-h4 deliveryText">Agregar Nueva Dirección de Entrega</h4> {{-- Creamos esa clase CSS deliveryText para usar el elemento HTML como un controlador para que jQuery cambie el contenido del <h4> al hacer clic en el botón Editar --}}

<div class="u-s-m-b-24">
    <input type="checkbox" class="check-box" id="ship-to-different-address" data-toggle="collapse" data-target="#showdifferent">

    @if (count($deliveryAddresses) > 0) {{-- Comprobando si hay direcciones de entrega ($deliveryAddresses) para el usuario actualmente autenticado/ingresado --}} {{-- La variable $deliveryAddresses se pasa desde el método checkout() en Front/ProductsController.php --}}
        <label class="label-text newAddress" for="ship-to-different-address">¿Enviar a una dirección diferente?</label>
    @else {{-- si no hay direcciones de entrega existentes --}}
        <label class="label-text newAddress" for="ship-to-different-address">Marque para agregar Dirección de Entrega</label>
    @endif

</div>

    <div class="collapse" id="showdifferent">
       <!-- Campos del Formulario -->

{{-- Nota: Para mostrar los Mensajes de Error de Validación del formulario (Mensajes de Error de Validación de Laravel) desde la respuesta de la llamada AJAX del servidor (backend), creamos una etiqueta <p> después de cada campo <input> --}}
{{-- Estructuramos y usamos un patrón específico para que el patrón del id de <p> debe ser como: delivery-x (por ejemplo, delivery-móvil, delivery-email, ... para que el bucle de jQuery funcione. Y x debe ser idéntico a los atributos HTML 'name' (por ejemplo, el <input> con el atributo HTML name='mobile' debe tener un <p> con un atributo HTML id id="delivery-mobile") para que cuando el arreglo de errores de validación se envíe como respuesta desde el backend/servidor (ver $validator->messages() dentro del método dentro del controlador) a la solicitud AJAX, puedan ser manejados de manera conveniente/fácil por el bucle jQuery $.each(). Ver front/js/custom.js --}}
<form id="addressAddEditForm" action="javascript:;" method="post">
    @csrf

    <input type="hidden" name="delivery_id"> {{-- Creamos este campo <input> oculto para enviar el id de la dirección de entrega cuando este formulario HTML se envía a través de AJAX para guardar la dirección de entrega en la tabla de base de datos `delivery_addresses`. Ver la función de Guardar Direcciones de Entrega a través de AJAX en el archivo front/js/custom.js --}} 
    <div class="group-inline u-s-m-b-13">
        <div class="group-1 u-s-p-r-16">
            <label for="delivery_name">Nombre
                <span class="astk">*</span>
            </label>
            <input class="text-field" type="text" id="delivery_name" name="delivery_name">
            <p id="delivery-delivery_name"></p> {{-- Esta etiqueta <p> será utilizada por jQuery para mostrar los Mensajes de Error de Validación (Mensajes de Error de Validación de Laravel) desde la respuesta de la llamada AJAX del servidor (backend) --}}
        </div>
        <div class="group-2">
            <label for="delivery_address">Dirección
                <span class="astk">*</span>
            </label>
            <input class="text-field" type="text" id="delivery_address" name="delivery_address">
            <p id="delivery-delivery_address"></p> {{-- Esta etiqueta <p> será utilizada por jQuery para mostrar los Mensajes de Error de Validación (Mensajes de Error de Validación de Laravel) desde la respuesta de la llamada AJAX del servidor (backend) --}}
        </div>
    </div>
    <div class="group-inline u-s-m-b-13">
        <div class="group-1 u-s-p-r-16">
            <label for="delivery_city">Ciudad
                <span class="astk">*</span>
            </label>
            <input class="text-field" type="text" id="delivery_city" name="delivery_city">
            <p id="delivery-delivery_city"></p> {{-- Esta etiqueta <p> será utilizada por jQuery para mostrar los Mensajes de Error de Validación (Mensajes de Error de Validación de Laravel) desde la respuesta de la llamada AJAX del servidor (backend) --}}
        </div>
        <div class="group-2">
            <label for="delivery_state">Estado
                <span class="astk">*</span>
            </label>
            <input class="text-field" type="text" id="delivery_state" name="delivery_state">
            <p id="delivery-delivery_state"></p> {{-- Esta etiqueta <p> será utilizada por jQuery para mostrar los Mensajes de Error de Validación (Mensajes de Error de Validación de Laravel) desde la respuesta de la llamada AJAX del servidor (backend) --}}
        </div>
    </div>
    <div class="u-s-m-b-13">
        <label for="select-country-extra">País
            <span class="astk">*</span>
        </label>
        <div class="select-box-wrapper">
            <select class="select-box" id="delivery_country" name="delivery_country">
                <option value="">Seleccionar País</option>

                @foreach ($countries as $country) {{-- $countries fue pasado desde UserController a la vista usando el método compact() --}}
                    <option value="{{ $country['country_name'] }}"  @if ($country['country_name'] == \Illuminate\Support\Facades\Auth::user()->country) selected @endif>{{ $country['country_name'] }}</option>
                @endforeach

            </select>
            <p id="delivery-delivery_country"></p> {{-- Esta etiqueta <p> será utilizada por jQuery para mostrar los Mensajes de Error de Validación (Mensajes de Error de Validación de Laravel) desde la respuesta de la llamada AJAX del servidor (backend) --}}
        </div>
    </div>
    <div class="u-s-m-b-13">
        <label for="delivery_pincode">Código Postal
            <span class="astk">*</span>
        </label>
        <input class="text-field" type="text" id="delivery_pincode" name="delivery_pincode">
        <p id="delivery-delivery_pincode"></p> {{-- Esta etiqueta <p> será utilizada por jQuery para mostrar los Mensajes de Error de Validación (Mensajes de Error de Validación de Laravel) desde la respuesta de la llamada AJAX del servidor (backend) --}}
    </div>
    <div class="u-s-m-b-13">
        <label for="delivery_mobile">Móvil
            <span class="astk">*</span>
        </label>
        <input class="text-field" type="text" id="delivery_mobile" name="delivery_mobile">
        <p id="delivery-delivery_mobile"></p> {{-- Esta etiqueta <p> será utilizada por jQuery para mostrar los Mensajes de Error de Validación (Mensajes de Error de Validación de Laravel) desde la respuesta de la llamada AJAX del servidor (backend) --}}
    </div>
    <div class="u-s-m-b-13">
        <button style="width: 100%" type="submit" class="button button-outline-secondary">Guardar</button> {{-- Guardar ya sea que sea Agregar o Editar --}} 
    </div>

</form>

<!-- Campos del Formulario /- -->




    </div>
    <div>
        <label for="order-notes">Notas de pedido</label>
        <textarea class="text-area" id="order-notes" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
    </div>