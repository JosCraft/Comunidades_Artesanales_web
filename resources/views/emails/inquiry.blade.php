{{-- Este es el formulario HTML en front/pages/contact.blade.php, es decir, la consulta del usuario al 'admin' enviada al 'admin' como un correo electrónico utilizando Mailtrap --}}
{{-- Todas las variables (como $name, $mobile, $email, ...) utilizadas aquí son pasadas desde el método contact() en Front/CmsController.php --}}



<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <table>
            <tr><td>¡Estimado Admin!</td></tr>
            <tr><td>&nbsp;</td></tr>
            <tr><td>Consulta del usuario en el sitio web de la Comunidad Artesanal, página de Contáctenos. Los detalles son los siguientes:</td></tr>
            <tr><td>&nbsp;</td></tr>
            <tr><td>Nombre: {{ $name }}</td></tr>
            <tr><td>&nbsp;</td></tr>
            <tr><td>Correo electrónico: {{ $email }}</td></tr>
            <tr><td>&nbsp;</td></tr>
            <tr><td>Asunto: {{ $subject }}</td></tr>
            <tr><td>&nbsp;</td></tr>
            <tr><td>Mensaje: {{ $comment }}</td></tr>
            <tr><td>&nbsp;</td></tr>
            <tr><td>&nbsp;</td></tr>
            <tr><td>Gracias y saludos,</td></tr>
            <tr><td>Comunidad Artesanal</td></tr>
        </table>
    </body>
</html>
