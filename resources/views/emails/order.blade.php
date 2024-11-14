{{-- Este es el archivo de Confirmación de Pedido del Usuario usando Mailtrap --}} {{-- Todas las variables (como $name, $mobile, $email, ...) utilizadas aquí son pasadas desde el método checkout() en Front/ProductsController.php --}}

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <table style="width: 700px">
            <tr><td>&nbsp;</td></tr>
            <tr><td><img src="{{ asset('front/images/main-logo/main-logo.png') }}"></td></tr>
            <tr><td>&nbsp;</td></tr>
            <tr><td>Hola {{ $name }}</td></tr>
            <tr><td>&nbsp;<br></td></tr>
            <tr><td>Gracias por comprar con nosotros. Los detalles de tu pedido son los siguientes:</td></tr>
            <tr><td>&nbsp;</td></tr>
            <tr><td>Pedido no. {{ $order_id }}</td></tr>
            <tr><td>&nbsp;</td></tr>
            <tr><td>
                <table style="width: 95%" cellpadding="5" cellspacing="5" bgcolor="#f7f4f4">
                    <tr bgcolor="#cccccc">
                        <td>Nombre del Producto</td>
                        <td>Código del Producto</td>
                        <td>Tamaño del Producto</td>
                        <td>Color del Producto</td>
                        <td>Cantidad del Producto</td>
                        <td>Precio del Producto</td>
                    </tr>
                    @foreach ($orderDetails['orders_products'] as $order)
                        <tr bgcolor="#f9f9f9">
                            <td>{{ $order['product_name'] }}</td>
                            <td>{{ $order['product_code'] }}</td>
                            <td>{{ $order['product_size'] }}</td>
                            <td>{{ $order['product_color'] }}</td>
                            <td>{{ $order['product_qty'] }}</td>
                            <td>{{ $order['product_price'] }}</td>
                        </tr>
                    @endforeach
                        <tr>
                            <td colspan="5" align="right">Cargos de Envío</td>
                            <td>Bs {{ $orderDetails['shipping_charges'] }}</td>
                        </tr>
                        <tr>
                            <td colspan="5" align="right">Descuento del Cupón</td>
                            <td>
                                Bs
                                @if ($orderDetails['coupon_amount'] > 0)
                                    {{ $orderDetails['coupon_amount'] }}
                                @else
                                    0
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td colspan="5" align="right">Total General</td>
                            <td>Bs {{ $orderDetails['grand_total'] }}</td>
                        </tr>
                </table>    
            </td></tr>
            <tr><td>&nbsp;</td></tr>
            <tr><td>
                <table>
                    <tr>
                        <td><strong>Dirección de Envío:</strong></td>
                    </tr>
                    <tr>
                        <td>{{ $orderDetails['name'] }}</td>
                    </tr>
                    <tr>
                        <td>{{ $orderDetails['address'] }}</td>
                    </tr>
                    <tr>
                        <td>{{ $orderDetails['city'] }}</td>
                    </tr>
                    <tr>
                        <td>{{ $orderDetails['state'] }}</td>
                    </tr>
                    <tr>
                        <td>{{ $orderDetails['country'] }}</td>
                    </tr>
                    <tr>
                        <td>{{ $orderDetails['pincode'] }}</td>
                    </tr>
                    <tr>
                        <td>{{ $orderDetails['mobile'] }}</td>
                    </tr>
                </table>    
            </td></tr>
            <tr><td>&nbsp;</td></tr>

            {{-- Enlace para descargar la factura en PDF --}}
            <tr>
                <td>
                    <a href="{{ url('orders/invoice/download/' . $orderDetails['id']) }}">Haz clic aquí para descargar la factura del pedido</a>
                    <br>
                    (Copia y pega el enlace si no funciona)
                </td>
            </tr>

            <tr><td>&nbsp;</td></tr>
            <tr><td>Para cualquier consulta, puedes contactarnos en <a href="mailto:info@MultiVendorEcommerceApplication.com.eg">info@MultiVendorEcommerceApplication.com.eg</a></td></tr>
            <tr><td>&nbsp;</td></tr>
            <tr><td>Saludos,<br>Equipo de la Aplicación E-commerce Multi-Vendedor</td></tr>
            <tr><td>&nbsp;</td></tr>
        </table>
    </body>
</html>
