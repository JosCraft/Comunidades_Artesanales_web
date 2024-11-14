{{-- Este es el correo electrónico de confirmación del usuario después del registro (que contiene el 'enlace de activación') usando Mailtrap --}}
{{-- Todas las variables (como $name, $mobile, $email, $code, ...) utilizadas aquí son pasadas desde el método userRegister() en Front/UserController.php --}}



<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>



        <table>
            <tr><td>Estimado {{ $name }},</td></tr>
            <tr><td>&nbsp;</td></tr>
            <tr><td>Por favor, haga clic en el enlace de abajo para activar su cuenta de la aplicación de comercio electrónico de múltiples proveedores:</td></tr>
            <tr><td>&nbsp;</td></tr>
            <tr><td><a href="{{ url('/user/confirm/' . $code) }}">Confirmar Cuenta</a></td></tr> {{-- $code es pasado desde el método userRegister() en UserController.php --}}
            <tr><td>&nbsp;</td></tr>
            <tr><td>&nbsp;</td></tr>
            <tr><td>Gracias y saludos,</td></tr>
            <tr><td>Comunidad Artesanal</td></tr>
        </table>



    </body>
</html>
