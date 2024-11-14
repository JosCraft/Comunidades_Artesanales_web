<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alerta de Bajo Stock</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: auto;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        h1 {
            color: #e74c3c;
        }
        p {
            font-size: 16px;
            color: #333;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            background: #ecf0f1;
            margin: 5px 0;
            padding: 10px;
            border-radius: 5px;
        }
        .footer {
            margin-top: 20px;
            font-size: 14px;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Alerta de Bajo Stock</h1>
        <p>Estimad@ Usuari@,</p>
        <p>Le informamos que los siguientes productos están por debajo del nivel de stock recomendado. Es importante tomar las medidas necesarias para evitar la falta de inventario:</p>
        <ul>
            @foreach ($products as $product)
                <li>{{ $product['product_name'] }} - Stock disponible: {{ $product['stock'] }}</li>
            @endforeach
        </ul>
        <p>Por favor, revise estos productos y considere realizar un nuevo pedido.</p>
        <p>Gracias por su atención.</p>
        <div class="footer">
            <p>Atentamente,<br>El equipo de gestión de inventario</p>
        </div>
    </div>
</body>
</html>
