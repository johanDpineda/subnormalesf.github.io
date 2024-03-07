<div class="modal fade animate__animated fadeIn" id="animationModal{{ $match->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="display: contents;">
      <div class="modal-content" style="background-color: #141414;">
        <div class="modal-header" style="text-align: center;">
          <h4 class="modal-title" id="exampleModalLabel5" style="margin: auto; ;color: #d3fe00;">Detalles del Partido</h4>
          <div style="position: absolute;bottom: 0;left: 50%;transform: translateX(-50%);width: 100%;height: 2px;background-color: #6a7f00;"></div>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body" style="padding: 0px !important;">

                <div class="player-info row align-items-center">
                    <div class="col-md-6">
                        <div class="player-details w-100">
                            <div class="details-row">
                                <div class="partidosoficiales">
                                    <div class="clubespartidos">
                                        <a href="">
                                            <div class="cluboficiales">
                                                @if($match->team_one->logo!=null)

                                                    <img
                                                        src="{{asset('uploads/teams/'.$match->team_one->logo) }}"
                                                        class="iconclubesliga size-xs">
                                                    <div class="textoequipo1">
                                                        <p class="nameclub">{{$match->team_one->name}}</p>
                                                    </div>

                                                @else

                                                    @php
                                                        $imagenes = File::allFiles(public_path('uploads/logoteams/'));
                                                        $imagenAleatoria = collect($imagenes)->random();
                                                    @endphp

                                                    @if ($imagenAleatoria)
                                                        <img src="{{ asset('uploads/logoteams/' . $imagenAleatoria->getFilename()) }}" alt="Descripción de la imagen" class="iconclubesliga size-xs">
                                                        <div class="textoequipo1">
                                                            <p class="nameclub">{{ Str::limit($match->team_one->name, 15) }}</p>
                                                        </div>
                                                    @else
                                                        <img src="{{asset('assets/img/favicon/favicon.png') }}" class="iconclubesliga size-xs">
                                                        <div class="textoequipo1">
                                                            <p class="nameclub">{{ Str::limit($match->team_one->name, 15) }}</p>
                                                        </div>
                                                    @endif



                                                    {{--  <img
                                                        src="{{asset('assets/img/favicon/favicon.png') }}"
                                                        class="iconclubesliga size-xs">
                                                    <div class="textoequipo1">
                                                        <p class="nameclub">{{$match->team_one->name}}</p>
                                                    </div>  --}}

                                                @endif


                                            </div>
                                        </a>
                                    </div>

                                    <div class="clubespartidosgf">

                                        <div class="live">
                                            <p class="marcadores">Vs</p>


                                        </div>
                                    </div>

                                    <div class="clubespartidos">
                                        <a href="">
                                            <div class="cluboficialesop2">

                                                @if($match->team_two->logo!=null)

                                                    <img
                                                        src="{{asset('uploads/teams/'.$match->team_two->logo) }}"
                                                        class="iconclubesliga size-xs">
                                                    <div class="textoequipo2">
                                                        <p class="nameclub">{{$match->team_two->name}}</p>
                                                    </div>

                                                @else
                                                    @php
                                                        $imagenes = File::allFiles(public_path('uploads/logoteams/'));
                                                        $imagenAleatoriamodalprogramin = collect($imagenes)->random();
                                                    @endphp

                                                    @if ($imagenAleatoriamodalprogramin)
                                                        <img src="{{ asset('uploads/logoteams/' . $imagenAleatoriamodalprogramin->getFilename()) }}" alt="Descripción de la imagen" class="iconclubesliga size-xs">
                                                        <div class="textoequipo2">
                                                            <p class="nameclub">{{ Str::limit($match->team_two->name, 15) }}</p>
                                                        </div>
                                                    @else
                                                        <img src="{{asset('assets/img/favicon/favicon.png') }}" class="iconclubesliga size-xs">
                                                        <div class="textoequipo2">
                                                            <p class="nameclub">{{ Str::limit($match->team_two->name, 15) }}</p>
                                                        </div>
                                                    @endif

                                                    {{--  <img
                                                        src="{{asset('assets/img/favicon/favicon.png') }}"
                                                        class="iconclubesliga size-xs">
                                                    <div class="textoequipo2">
                                                        <p class="nameclub">{{$match->team_two->name}}</p>
                                                    </div>  --}}

                                                @endif


                                            </div>
                                        </a>
                                    </div>

                                </div>
                            </div>

                            <div class="details-row">

                                <div class="details-cell">
                                    <p style="color: #d3fe00;"><span class="letramodaljugador">Cancha:</span> <span class="info-player">{{$match->canchasjuego->name}}</span> </p>
                                </div>

                                    @php
                                        $nombres = explode(' ', $match->arbitrator->name);
                                        $primerNombre = $nombres[0];
                                        $apellidos= explode(' ', $match->arbitrator->lastname);
                                        $primerapellido = $apellidos[0];
                                    @endphp
                                <div class="details-cell">
                                    <p style="color: #d3fe00;"><span class="letramodaljugador">Nombre Arbitro:</span> <span class="info-player"></span>{{$primerNombre}}  {{$primerapellido}}</p>
                                </div>
                            </div>
                            <div class="details-row">
                                <div class="details-cell">
                                    <p style="color: #d3fe00;"><span class="letramodaljugador">Estado:</span> <span class="info-player"> {{$match->status->name}}</span> </p>
                                </div>
                            </div>

                        </div>
                    </div>



                </div>




        </div>




      </div>
    </div>
</div>

