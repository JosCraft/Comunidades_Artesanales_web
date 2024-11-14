@extends('front.layout.layout')

@section('content')

    <style>
        .button {
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
        }
        
        .button1 {background-color: #4CAF50;} /* Green */
        .button2 {background-color: #008CBA;} /* Blue */

        .disabled {
            opacity: 0.6;
            cursor: not-allowed;
        }

        .success-message {
            display: none;
            color: green;
            font-size: 20px;
            margin-top: 20px;
        }

        .hidden {
            display: none;
        }
    </style>

    <!-- Page Introduction Wrapper -->
    <div class="page-style-a">
        <div class="container">
            <div class="page-intro">
                <h2>Carrito</h2>
                <ul class="bread-crumb">
                    <li class="has-separator">
                        <i class="ion ion-md-home"></i>
                        <a href="index.html">Inicio</a>
                    </li>
                    <li class="is-marked">
                        <a href="#">Pago por tarjeta</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Page Introduction Wrapper /- -->
    <!-- Cart-Page -->
    <div class="page-cart u-s-p-t-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-12" align="center">
                    <form id="CVForm" action="javascript:;" method="post">
                        @csrf
                        <div class="form-fields">
                            <div>
                                <label>Número de Tarjeta
                                <span class="astk">*</span>
                                <input type="text" id="CvNumber" class="text-field" placeholder="ej: 898*******" name="card_number" autocomplete="off" required />
                                </label>
                            </div>
                            <div>
                                <label>Fecha de expiración
                                <span class="astk">*</span>
                                <input type="text" id="CvDate" class="text-field" placeholder="ej: 05/26" name="cvdate" autocomplete="off" required/>
                                </label>
                            </div>
                            <div>
                                <label>Codigo de Seguridad
                                <span class="astk">*</span>
                                <input type="text" id="CvCode" class="text-field" placeholder="ej: 000" name="codeCv" autocomplete="off" required/>
                                </label>
                            </div>
                            <div>
                                <label>Nit o Ci
                                <span class="astk">*</span>
                                <input type="text" id="NitCi" class="text-field" placeholder="ej: 8310****" name="NitCi" autocomplete="off" required/>
                                </label>
                            </div>
                            <button id="botonVerCV" class="button button1" >Verificar Datos</button>
                        </div>
                    </form>
                    <button id="PayCV" class="button disabled" disabled>Confirmar Pago</button>

                    <!-- Mensaje de éxito -->
                    <div id="successMessage" class="success-message">
                        ¡Pago realizado con éxito!
                    </div>
                    
                    <script>
                        const botonVerCV = document.getElementById('botonVerCV');
                        const PayCV = document.getElementById('PayCV');
                        const CVForm = document.getElementById('CVForm');
                        const successMessage = document.getElementById('successMessage');
                        const formFields = document.querySelector('.form-fields');

                        // Al verificar los datos, habilitamos el botón de pago
                        CVForm.addEventListener('submit', function (event) {
                            event.preventDefault();
                            PayCV.classList.add('button2');
                            PayCV.classList.remove('disabled');
                            PayCV.disabled = false;
                        });

                        // Al hacer clic en el botón de pago, mostramos el mensaje de éxito y ocultamos el formulario
                        PayCV.addEventListener('click', function () {
                            if (!PayCV.disabled) {
                                successMessage.style.display = 'block'; // Mostrar el mensaje de éxito
                                formFields.classList.add('hidden'); // Ocultar los campos del formulario
                                PayCV.disabled = true; // Deshabilitar el botón para evitar clics repetidos
                                PayCV.classList.add('disabled'); // Cambiar el estilo del botón a deshabilitado
                            }
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart-Page /- -->
@endsection
