@extends('frontend.layouts.app')
@section('title',__('Conteo Partido'))
@section('content')

    <!-- Pantalla de carga -->
    @include('frontend.layouts.partials.bannermifutbol')
    @include('frontend.layouts.partials.sponsors')
    <div class="background-league">
        <div class="content">
            <div id="full-width-div">
                <a href="{{ route('programacion.view', ['league_slug' => $leagueSlug, 'tournament_slug' => $defaultTournament]) }}">
                    <button id="regresar-button" >
                        <i id="arrow-icon" class="fas fa-arrow-left">

                        </i>
                        Regresar
                    </button>
                </a>

            </div>
            @include('frontend.modalvistarapidaequipo.index')
            @include('frontend.modalvistarapidaequipo2.index')
            @include('frontend.perfilarbitro.index')
            @include('frontend.mapascanchas.index')
            <div class="container">
                <section class="mc-summary ">
                    <div class="mc-summary__wrapper">
                        <div class="mc-summary__info-containerddf" id="divinfotiempo">


                            <div class="mc-summary__info">
                                <span class="textomodocelresumen">Fecha </span> <span>{{ $partido->date }}</span>
                            </div>

                            <div class="vertical-line"></div>

                            <div class="mc-summary__info">
                                <p class="neutral"  type="button" data-bs-toggle="modal" data-bs-target="#modalCancha{{$cancha->id}}" data-backdrop="static"><span class="textomodocelresumen">Cancha </span> {{$partido->canchasjuego->name}}</p>
                            </div>

                            <div class="vertical-line"></div>
                            @php
                                $nombres = explode(' ', $partido->arbitrator->name);
                                $primerNombre = $nombres[0];

                                $apellidos = explode(' ', $partido->arbitrator->lastname);

                                // Verifica si hay al menos un apellido
                                if (isset($apellidos[0])) {
                                    $primerapellido = $apellidos[0];
                                } else {
                                    $primerapellido = '';
                                }

                                // Verifica si hay un segundo apellido
                                if (isset($apellidos[1])) {
                                    $segundopellido = $apellidos[1];
                                } else {
                                    $segundopellido = '';
                                }
                            @endphp

                            <div class="mc-summary__info">
                                <p class="neutral" type="button" data-bs-toggle="modal" data-bs-target="#modalArbitro{{$arbitro->id}}" ><span class="textomodocelresumen">Arbitro </span> {{$primerNombre}} {{$primerapellido}} {{$segundopellido }}</p>
                            </div>

                        </div>

                        <div class="mc-summary__scorebox-container">
                            <div class="mc-summary__teams-container">

                                <div class="mc-summary__team-container">

                                    <div class="mc-summary__team home t8">
                                        <a href="" class="mc-summary__badge-container"  type="button" data-bs-toggle="modal" data-bs-target="#modalvistarapido{{$partido->id}}">
                                            @if($partido->team_one->logo!=null  )
                                                <span class="badge badge-image-container" data-widget="club-badge-image"
                                                      data-size="80">
                                        <img class="badge-image badge-image--80 js-badge-image"
                                             src="{{asset('uploads/teams/'.$partido->team_one->logo) }}">
                                    </span>
                                            @else

                                                @php
                                                    $imagenes = File::allFiles(public_path('uploads/logoteamscolor/'));
                                                    $imagenAleatoria = collect($imagenes)->random();
                                                @endphp

                                                <span class="badge badge-image-container" data-widget="club-badge-image" data-size="80">

                                                    @if ($imagenAleatoria)
                                                        <img src="{{ asset('uploads/logoteamscolor/' . $imagenAleatoria->getFilename()) }}" alt="Descripción de la imagen" class="badge-image badge-image--80 js-badge-image">
                                                    @else
                                                        <img src="{{asset('assets/img/favicon/favicon.png') }}" class="badge-image badge-image--80 js-badge-image">
                                                    @endif






                                                    {{--  <img class="badge-image badge-image--80 js-badge-image"
                                                        src="{{asset('assets/img/favicon/favicon.png') }}">  --}}
                                                </span>

                                            @endif

                                        </a>

                                        <a href="" class="mc-summary__team-name-link t8"  type="button" data-bs-toggle="modal" data-bs-target="#modalvistarapido{{$partido->id}}">
                                    <span class="mc-summary__team-name u-hide-phablet"><font
                                            style="vertical-align: inherit;"><font
                                                style="vertical-align: inherit;">{{ Str::limit($partido->team_one->name, 15) }} </font></font></span>
                                            <span class="mc-summary__team-name u-show-phablet">{{ substr($partido->team_one->name, 0, 3) }}</span>
                                        </a>


                                    </div>




                                </div>

                                <div class="mc-summary__score-container complete">
                                    <div class="mc-summary__score js-mc-score">
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">
                                                {{ \Carbon\Carbon::parse(json_decode($partido)->hour)->format('H:i') }}

                                            </font>
                                        </font>
                                    </div>

                                </div>

                                <div class="mc-summary__team-container">
                                    <div class="mc-summary__team away t36">

                                        <a href="" class="mc-summary__badge-container" data-bs-toggle="modal" data-bs-target="#modalvistarapidoequipo2{{$partido->id}}">

                                            @if($partido->team_two->logo!=null  )
                                                <span class="badge badge-image-container" data-widget="club-badge-image"
                                                      data-size="80">
                                                <img class="badge-image badge-image--80 js-badge-image"
                                                     src="{{asset('uploads/teams/'.$partido->team_two->logo) }}">
                                            </span>

                                            @else

                                                <span class="badge badge-image-container" data-widget="club-badge-image" data-size="80">

                                                    @if ($imagenAleatoria)
                                                        <img src="{{ asset('uploads/logoteamscolor/' . $imagenAleatoria->getFilename()) }}" alt="Descripción de la imagen" class="badge-image badge-image--80 js-badge-image">
                                                    @else
                                                        <img src="{{asset('assets/img/favicon/favicon.png') }}" class="badge-image badge-image--80 js-badge-image">
                                                    @endif

                                                    {{--  <img class="badge-image badge-image--80 js-badge-image"
                                                        src="{{asset('assets/img/favicon/favicon.png') }}">  --}}
                                                </span>

                                            @endif


                                        </a>

                                        <a href="" class="mc-summary__team-name-link t8" data-bs-toggle="modal" data-bs-target="#modalvistarapidoequipo2{{$partido->id}}">
                                    <span class="mc-summary__team-name u-hide-phablet"><font
                                            style="vertical-align: inherit;"><font
                                                style="vertical-align: inherit;">{{ Str::limit($partido->team_two->name, 15) }}</font></font></span>
                                            <span class="mc-summary__team-name u-show-phablet">{{ substr($partido->team_two->name, 0, 3) }}</span>
                                        </a>


                                    </div>



                                </div>

                            </div>

                        </div>

                        <div class="mc-summary__time-containersds">

                            <div class="countdownContainer">

                                <div id="cuenta-regresiva" data-fecha-partido="{{ $partido->date }}"
                                     data-hora-partido="{{ $partido->hour }}">

                                </div>


                                <div id="estadospartidos" estadospartidos="{{ $partido->status_id }}"

                            </div>



                            <div class="verpartidofdf" id="infoTiempoAcabado" style="display: none;">

                                <div class="imagenesestados" style="width: 100%;font-family: Abel;font-size: 15px;display: flex;justify-content: center; align-items: center; ">
                                    <!-- Imagen del partido jugado (oculta por defecto) -->
                                    <img id="imgjugando" class="estilojugando" src="{{asset('assets/img/partido.gif') }}" style="display: none;" alt="Partido en juego">

                                    <!-- Imagen del partido en finalizado (oculta por defecto) -->
                                    <img id="imgfinalizado" class="estilofinalizado" src="{{asset('assets/img/silbato.gif') }}" style="display: none;" alt="Partido Finalizado">

                                    <!-- Imagen del partido suspendido (oculta por defecto) -->
                                    <img id="imgsuspendido" class="estilosuspendido" src="{{asset('assets/img/partidosuspendido.gif') }}" style="display: none;" alt="Partido Suspendido">

                                    <!-- Imagen del partido en programado (oculta por defecto) -->
                                    <img id="imgprogramado" class="estiloprogramado" src="{{asset('assets/img/calendariopartido.gif') }}" style="display: none;" alt="Partido Programado">
                                </div>

                                <div class="texto"  id="textjugando" style="display: none;" >
                                    <p style="color: white;font-weight: bold;">El Partido se está Jugando</p>
                                </div>

                                <div class="texto" id="textfinalizado" style="display: none;">
                                    <p style="color: white;font-weight: bold;">El Partido está Finalizado</p>
                                </div>

                                <div class="texto" id="textsuspendido" style="display: none;">
                                    <p style="color: white;font-weight: bold;">El Partido está Suspendido</p>
                                </div>

                                <div class="texto" id="textprogramado" style="display: none;">
                                    <p style="color: white;font-weight: bold;">El Partido está Programado</p>
                                </div>

                                {{--                                <a href="{{ route('Resumenpartido.view', ['league_slug' => $leagueSlug, 'tournament_slug' => $defaultTournament, 'id_partido' => $partido->id]) }}">--}}
                                {{--                                    <button class="boton">Ver Partido</button>--}}
                                {{--                                </a>--}}
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

@endsection
