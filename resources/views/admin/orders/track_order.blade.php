{{-- resources/views/front/track_order.blade.php --}}
@extends('front.layout.layout')

@section('content')
    <!-- Encabezado de la Página -->
    <div class="page-style-a">
        <div class="container">
            <div class="page-intro">
                <h2>Rastreo de Pedido</h2>
                <ul class="bread-crumb">
                    <li class="has-separator">
                        <i class="ion ion-md-home"></i>
                        <a href="{{ url('/') }}">Inicio</a>
                    </li>
                    <li class="has-separator">
                        <a href="{{ url('user/orders') }}">Pedidos</a>
                    </li>
                    <li class="is-marked">
                        <a href="#">Rastreo de Pedido</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Encabezado de la Página /- -->
    <!-- Rastreo de Pedido -->
    <div class="page-track-order u-s-p-t-80 u-s-p-b-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h3>Pedido ID: {{ $order->id }}</h3>
                    <p>Estado del Pedido: {{ end($trackingData)['status'] }}</p>
                    <div id="map" style="height: 500px; width: 100%;"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Rastreo de Pedido /- -->
@endsection

@push('scripts')
    <!-- Incluir la API de Google Maps -->
    <script src="https://maps.googleapis.com/maps/api/js?key={{ config('services.google.maps_api_key') }}"></script>
    <script>
        function initMap() {
            // Coordenadas iniciales (puede ser la primera ubicación de trackingData)
            var initialLocation = { lat: {{ $trackingData[0]['lat'] }}, lng: {{ $trackingData[0]['lng'] }} };

            // Crear el mapa
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 12,
                center: initialLocation
            });

            // Crear un marcador para cada ubicación
            var markers = [];
            var path = [];

            @foreach ($trackingData as $data)
                var position = { lat: {{ $data['lat'] }}, lng: {{ $data['lng'] }} };
                path.push(position);
                markers.push(new google.maps.Marker({
                    position: position,
                    map: map,
                    title: "{{ $data['status'] }}"
                }));

                // Añadir una ventana de información
                var infowindow = new google.maps.InfoWindow({
                    content: "<strong>{{ $data['status'] }}</strong>"
                });

                markers[markers.length - 1].addListener('click', function() {
                    infowindow.open(map, markers[markers.length - 1]);
                });
            @endforeach

            // Dibujar el camino de rastreo
            var flightPath = new google.maps.Polyline({
                path: path,
                geodesic: true,
                strokeColor: "#FF0000",
                strokeOpacity: 1.0,
                strokeWeight: 2
            });

            flightPath.setMap(map);

            // Ajustar el mapa para mostrar todas las ubicaciones
            var bounds = new google.maps.LatLngBounds();
            path.forEach(function(point) {
                bounds.extend(point);
            });
            map.fitBounds(bounds);
        }

        // Inicializar el mapa cuando la ventana cargue
        window.onload = initMap;
    </script>
@endpush
