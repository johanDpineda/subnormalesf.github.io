<div class="modal fade animate__animated fadeIn" id="modalCancha{{$cancha->id}}" tabindex="-1" aria-hidden="true" aria-labelledby="miModalLabel" >
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content modal-contentpefil">
        <div class="modal-header" style="text-align: center;">
          <h4 class="modal-title" id="exampleModalLabel5" style="margin: auto; ;color: #d3fe00;">Detalles de la Cancha</h4>
          <div style="position: absolute;bottom: 0;left: 50%;transform: translateX(-50%);width: 100%;height: 2px;background-color: #6a7f00;"></div>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">

                <div class="player-info row align-items-center">

                    <input type="hidden" id="latitud" value="{{ $cancha->latitude }}">
                    <input type="hidden" id="longitud" value="{{ $cancha->longitude }}">
                    <input type="hidden" id="namecourts" value="{{ $cancha->name }}">
                    <input type="hidden" id="image" value="{{ $cancha->image }}">

                        <div class="contendorcancha" >
                            <div id="map" style="width: 100%; height: 300px;"></div>





                        </div>


                        <div class="col-5">
                            @if($cancha->image!=null)

                                <div class="player-photo">
                                    <img src="{{asset('uploads/courts/'.$cancha->image) }}"
                                         class="styled__ImageStyled-sc-17v9b6o-0 ">
                                </div>
                            @else
                                <div class="player-photo">
                                    <img src="{{asset('assets/img/favicon/favicon.png') }}"
                                         class="styled__ImageStyled-sc-17v9b6o-0 " style="width: 100% !important;min-height: 50% !important;">
                                </div>
                            @endif
                        </div>
                        <div class="col-7">
                            <div class="player-details w-100">
                                <div class="details-row">
                                    <div class="details-cell">
                                        <p style="color: #d3fe00;"><span class="letramodaljugador">Nombre:</span> <span class="info-player text-end" style="text-transform: uppercase;">{{ $cancha->name}}</span> </p>
                                    </div>
                                    <div class="details-cell">
                                        <p style="color: #d3fe00;"><span class="letramodaljugador">Liga Asociada:</span> <span class="info-player" style="text-transform: uppercase;">{{ $cancha->league->name}}</span> </p>
                                    </div>


                                        <div class="details-cell">
                                            <p style="color: #d3fe00;"><span class="letramodaljugador">Partidos Jugados:</span> <span class="info-player" style="text-transform: uppercase;">{{  $courtsContados  }}</span> </p>
                                        </div>


                                </div>

                            </div>
                        </div>

                </div>




        </div>

        <div class="contenedor-horizontal">
            <div class="elemento" style="margin-top: 6px;flex: 1;display: flex;justify-content: center;align-items: center;">
                <button id="mostrarRutaBtn" type="button" class="btn btn-primary infopartidoverMovil" style="height: 42px;width: 40%;">
                   <span style="margin-right: 5px;font-weight:bold">{{__('Indications')}}</span> <i class="fa-solid fa-map-location-dot fa-xl" style="color: #080808;"></i> </i>
                </button>
            </div>

        </div>




      </div>
    </div>
</div>

<style>
    .infowindow {
        display: flex;
        align-items: center;
        background-color: #f1f1f1;
        padding: 10px;
        border-radius: 8px;
    }
    .infowindow-image {
        width: 80px;
        height: auto;
        margin-right: 10px;
    }
    .titulonamecourts {
        font-size: 15px;
        color: black
    }

    /* Media Query para pantallas con ancho máximo de 600px (modo móvil) */
    @media (max-width: 600px) {
        .infowindow {
            display: flex;
            /* align-items: flex-start; */
            /* margin-left: 20px; */
            width: 100%;
        }
        .infowindow-image {
            width: 55%;
            margin-right: 0;
            /* margin-bottom: 10px;*/
        }
        .titulonamecourts {
            font-size: 12px;
            color: black
        }
        .infowindow-name{
            margin-left: 7px;
        }
    }
</style>


<script>
    window.addEventListener('load', function() {
        var latitud;
        var longitud;

        function initMap() {
            // Obtener la ubicación actual del usuario
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    latitud = position.coords.latitude;
                    longitud = position.coords.longitude;

                    // Resto del código...
                    latitud = parseFloat(document.getElementById('latitud').value);
                    longitud = parseFloat(document.getElementById('longitud').value);
                    var namecourts = document.getElementById('namecourts').value;
                    var image = document.getElementById('image').value;

                    var mapOptions = {
                        center: { lat: latitud, lng: longitud },
                        zoom: 12
                    };

                    var map = new google.maps.Map(document.getElementById('map'), mapOptions);

                    var marker = new google.maps.Marker({
                        position: { lat: latitud, lng: longitud },
                        map: map,
                        title: namecourts,
                        icon: {
                            url: '{{asset('assets/img/ubicacionestadio.svg') }}',
                            scaledSize: new google.maps.Size(55, 55)
                        }
                    });

                    var contentString =
                        '<div class="infowindow">' +
                        '<img class="infowindow-image" src="{{asset('uploads/courts/'.$cancha->image) }}" alt="' + namecourts + '">' +
                        '<div class="infowindow-name">' +
                        '<h3 class="titulonamecourts">' + namecourts + '</h3>' +
                        '</div>' +
                        '</div>';

                    var infowindow = new google.maps.InfoWindow({
                        content: contentString
                    });

                    marker.addListener('click', function() {
                        infowindow.open(map, marker);
                    });

                    map.addListener('click', function() {
                        infowindow.close();
                    });

                    map.addListener('click', function(event) {
                        event.stopPropagation();
                    });

                    // Agregar un botón para mostrar la ruta
                    var mostrarRutaBtn = document.getElementById('mostrarRutaBtn');
                    mostrarRutaBtn.addEventListener('click', mostrarRuta);
                }, function(error) {
                    console.error('Error al obtener la ubicación: ', error);
                });
            } else {
                console.error('La geolocalización no está soportada por este navegador.');
            }
        }

        function mostrarRuta() {
            // Abre una nueva ventana de Google Maps con la ruta desde la ubicación actual hasta la cancha
            window.open('https://www.google.com/maps/dir/?api=1&destination=' + latitud + ',' + longitud, '_blank');
        }

        initMap();
    });
</script>
















{{--  <script>
    window.addEventListener('load', function() {
        function initMap() {
            var latitud = parseFloat(document.getElementById('latitud').value);
            var longitud = parseFloat(document.getElementById('longitud').value);
            var namecourts = document.getElementById('namecourts').value;
            var image = document.getElementById('image').value;


            var mapOptions = {
                center: { lat: latitud, lng: longitud },
                zoom: 12
            };



            var map = new google.maps.Map(document.getElementById('map'), mapOptions);



           // Agregar un marcador en la ubicación
            var marker = new google.maps.Marker({
            position: { lat: latitud, lng: longitud },
            map: map,
            title: namecourts,
            icon: {
                url: '{{asset('assets/img/ubicacionestadio.svg') }}', // Ruta a la imagen del balón
                scaledSize: new google.maps.Size(55, 55) // Tamaño del icono
            }
        });

         // Crear contenido personalizado para el infowindow
         var contentString =

         '<div class="infowindow">' +
            '<img class="infowindow-image" src="{{asset('uploads/courts/'.$cancha->image) }}" alt="' + namecourts + '">' +
            '<div class="infowindow-name">' +
            '<h3 class="titulonamecourts">' + namecourts + '</h3>' +
            '</div>' +
            '</div>';

            // Crear un InfoWindow con el contenido personalizado
            var infowindow = new google.maps.InfoWindow({
                content: contentString
            });

            // Mostrar el InfoWindow al hacer clic en el marcador
            marker.addListener('click', function() {
                infowindow.open(map, marker);
            });

             // Cerrar el InfoWindow al hacer clic en cualquier lugar en el mapa
            map.addListener('click', function() {
                infowindow.close();
            });

            // Evitar propagación de eventos en el mapa
            map.addListener('click', function(event) {
                event.stopPropagation();
            });

        }

        /* Crear un InfoWindow con el nombre y la clase CSS personalizada
        var infowindow = new google.maps.InfoWindow({
            content: '<div class="infowindow-text">' + namecourts + '</div>'
        });


         // Crear un overlay para mostrar el nombre encima del marcador
         var infowindow = new google.maps.OverlayView();
         infowindow.draw = function() {
             var div = this.div;
             if (!div) {
                 div = this.div = document.createElement('div');
                 div.className = 'infowindow';
                 div.textContent = namecourts;
                 var panes = this.getPanes();
                 panes.overlayImage.appendChild(div);
             }
         };
         infowindow.setMap(map);

         // Mostrar el InfoWindow encima del marcador al hacer clic en él
        marker.addListener('click', function() {
            var infowindowDiv = infowindow.div;
            if (infowindowDiv) {
                infowindowDiv.style.display = 'block';
            }
        });

        // Ocultar el InfoWindow al hacer clic en cualquier otro lugar del mapa
        map.addListener('click', function() {
            var infowindowDiv = infowindow.div;
            if (infowindowDiv) {
                infowindowDiv.style.display = 'none';
            }
        });

            // Evitar propagación de eventos en el mapa
            map.addListener('click', function(event) {
                event.stopPropagation();
            });
        }
        */

        initMap(); // Llamamos a la función de inicialización aquí
    });
</script>  --}}






<!-- Script de Bootstrap para manejar el modal -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
