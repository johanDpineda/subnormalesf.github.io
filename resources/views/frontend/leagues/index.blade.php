@extends('frontend.layouts.app')
@section('title',__('Mi.futbol'))

@section('content')
    <!-- Pantalla de carga -->



        <div id="carouselExample" class="carousel slide">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    @if ($selectedbanner !== null)
                    <!-- La imagen no es null, mostrar la imagen seleccionada -->
                    <img src="{{ asset('uploads/imageadmin/' . $selectedbanner) }}" class="d-block w-100 bannerjugadortorneo" alt="...">
                @else
                    <!-- La imagen es null, mostrar una imagen por defecto -->
                    <img src="{{ asset('assets/img/web/bannerprincipaloriginal.webp') }}" class="d-block w-100 bannerjugadortorneo" alt="...">
                @endif

                </div>
            </div>

            <div class="logomifutbol">
                <img src="{{asset('assets/img/web/logofutbol.webp') }}" class="bannerlogomifutbol">
            </div>
            <div class="lineaverde"></div>
        </div>
    <div class="container-xl flex-grow-1 container-p-y">
        @include('frontend.layouts.partials.sponsors')


        <div class="container">
            <section class="md__tw-flex-1">
                <div class="card-matches ">
                    <h3 class="text-primary" style="text-align: center;">Próximos Partidos</h3>

                    <div class="settings-tray-editable" id="block-horizontalresults-2" data-drupal-settingstray="editable">
                        <div id="27c03a9f-7074-4432-b079-62593ddb169c" class="opta-feeds-horizontal-results">
                            <div class="widget-result tw-mb-6 tw-mt-4 tw-pt-4 tw-border-b tw-border-alto">
                                <div class="tw-pt-3 tw-overflow-y-hidden tw-whitespace-nowrap md__tw-overflow-auto scroll-bar-custom">
                                            <div class="tw-flex tw-items-start tw-gap-x-6 tw-px-1 partidosoficiales {{$matchs->count()<= 3?'justify-content-center':''}}" >

                                                @foreach($matchs as $match)
                                                    @foreach ($fechas as $date)
                                                        @if($date->id == $match->session_id)


                                                            <a href="{{ route('conteopartido.view', ['league_slug' => $league->slug, 'tournament_slug' => $tournament->slug, 'id_partido' => $match->id]) }}">
                                                                <div class="tw-m-auto match__content tw-grid tw-place-items-center tw-gap-y-3 tw-p-4 tw-w-full tw-min-w-[300px] tw-max-w-max tw-h-auto tw-min-h-[240px] tw-my-3 tw-shadow-default tw-cursor-pointer is-active partidostorneooo  partidosprogramdos">
                                                                    <div class="match__info tw-w-full tw-px-2">
                                                                        <div class="match__info--date tw-text-[13px] tw-text-orange-1 tw-font-bold" style="color: white !important;"> {{$match->date  }} - {{$match->status->name }} - {{ $match->group->name }}</div>
                                                                        <hr class="tw-my-1">
                                                                        <div class="match__info--tournament tw-text-[11px] tw-text-black tw-font-bold" style="color: white !important;">{{$match->tournament->name}}| {{$match->session->name}}</div>
                                                                    </div>

                                                                    <div class="match__team tw-flex tw-items-center tw-justify-center tw-gap-x-4">
                                                                        @if($match->team_one->logo!=null)
                                                                            <div class="match__team--home tw-flex-auto tw-w-full tw-max-w-[40%]">
                                                                                <img src="{{asset('uploads/teams/'.$match->team_one->logo) }}" class="match__team--home__img tw-w-full tw-max-w-[48px] tw-h-auto tw-max-h-[48px] tw-mx-auto tw-object-contain tw-object-center">
                                                                            </div>
                                                                        @else
                                                                            <div class="match__team--home tw-flex-auto tw-w-full tw-max-w-[40%]">
                                                                                <img src="{{asset('assets/img/favicon/favicon.png') }}"
                                                                                    class="match__team--home__img tw-w-full tw-max-w-[48px] tw-h-auto tw-max-h-[48px] tw-mx-auto tw-object-contain tw-object-center">
                                                                            </div>
                                                                        @endif

                                                                        <div class="match__team--score tw-flex-auto tw-w-full tw-max-w-[20%] tw-text-center text-red-700">
                                                                            <div
                                                                                class="match__team--score__current tw-text-2xl tw-text-black tw-leading-none tw-font-bold cuadrovs">
                                                                                <span class="textoindicadoresgol2">vs</span>
                                                                            </div>
                                                                        </div>


                                                                        @if($match->team_two->logo!=null)
                                                                            <div class="match__team--home tw-flex-auto tw-w-full tw-max-w-[40%]">
                                                                                <img src="{{asset('uploads/teams/'.$match->team_two->logo) }}"
                                                                                    class="match__team--home__img tw-w-full tw-max-w-[48px] tw-h-auto tw-max-h-[48px] tw-mx-auto tw-object-contain tw-object-center">
                                                                            </div>
                                                                        @else
                                                                            <div class="match__team--home tw-flex-auto tw-w-full tw-max-w-[40%]">
                                                                                <img src="{{asset('assets/img/favicon/favicon.png') }}" class="match__team--home__img tw-w-full tw-max-w-[48px] tw-h-auto tw-max-h-[48px] tw-mx-auto tw-object-contain tw-object-center">
                                                                            </div>
                                                                        @endif
                                                                    </div>

                                                                    <div class="equipostorneodago">
                                                                        <div class="equipo">

                                                                            <span class="textonameclub">{{ Str::limit($match->team_one->name, 15) }}</span>

                                                                        </div>
                                                                        <div class="linea"></div>
                                                                        <div class="equipo">
                                                                            <span class="textonameclub">{{ Str::limit($match->team_two->name, 15) }}</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </a>

                                                            @php $cumpleCondicion = true; @endphp

                                                        @endif
                                                    @endforeach

                                                    @if (!isset($cumpleCondicion))
                                                        <div class="nohaypartidosprogramados heartbeat " id="nocontainerpartidosprogramados">
                                                            <p class="sinpartidosdsd nopartidosprogramdos"> Aun no hay eventos deportivos programados</p>
                                                            <img src="{{asset('assets/img/fut.svg') }}" class="icononohaypartido nopartidosprogramdos">
                                                        </div>
                                                    @endif

                                                @endforeach


                                            </div>

                                            @if ($matchs->isEmpty())
                                                <div class="nohaypartidosprogramados heartbeat text-center">
                                                    <p class="text-center"> Aun no hay eventos deportivos programados dentro del
                                                        grupo</p>
                                                    <img src="{{asset('assets/img/arquero.svg') }}" class="icononohaypartido">
                                                </div>
                                            @endif

                                </div>
                            </div>
                        </div>

                    </div>





                </div>
            </section>
        </div>
        {{--    ranking equipos--}}
    </div>

        <div id="carouselContainer" >



                <div class="slick-listbv Carouselesb" id="carouselContainer">

                    <div class="container-xl flex-grow-1 container-p-y">

                        <button class="prev slick-arrowfrg btnprev">
                            <img src="{{asset('assets/img/flecha-izquierda.png') }}" alt="Image" class="svgiconizquierda">
                        </button>

                        <button class="next slick-arrowfrg btnnext">
                            <img src="{{asset('assets/img/flecha-derecha.png') }}" alt="Image" class="svgiconizquierda">
                        </button>


                            <div class="slick-trackmnv2 " id="track">
                                @foreach ($top10clubes as $top10clube)
                                    @if($top10clube === $mejoresclubes)
                                        <div class="slick" >
                                            <div class="estiloscardgolestr">
                                                <a href="{{ route('teams.show', ['league_slug' => $leagueSlug, 'tournament_slug' => $defaultTournament,'team_slug'=>$top10clube->teams->slug]) }}">
                                                    <h4 class="titlefotojugadores"><small style="margin-top: 13px;" class="nomtotal">{{ Str::limit($top10clube->teams->name, 15) }}</small></h4>
                                                    @if($top10clube->teams->logo!=null)
                                                        <img src="{{asset('uploads/teams/'.$top10clube->teams->logo) }}" alt="Image"
                                                            class="ffdfdf">
                                                    @else
                                                        @php
                                                            $imagenes = File::allFiles(public_path('uploads/logoteams/'));
                                                            $imagenAleatoria = collect($imagenes)->random();
                                                        @endphp
                                                        @if ($imagenAleatoria)
                                                            <img src="{{ asset('uploads/logoteams/' . $imagenAleatoria->getFilename()) }}" alt="Descripción de la imagen" class="ffdfdf" style="
                                                            width: 77%;
                                                            /* display: flex !important; */
                                                            /* align-items: center !important; */
                                                            /* justify-content: center !important; */
                                                            margin-left: 30px !important;
                                                        ">
                                                        @else
                                                            <p>No se encontraron imágenes.</p>
                                                        @endif

                                                        {{--  <img src="{{asset('assets/img/favicon/favicon.png') }}" alt="Image" class="ffdfdf">  --}}
                                                    @endif
                                                    <div class="estiloscardgoles"></div>
                                                    <div class="cuadritoposicion">
                                                        <span class="textoindicadoresgol"><b>{{ $loop->iteration }}</b></span>
                                                        <span class="textoindicadoresgol2"><b>POS</b></span>
                                                    </div>
                                                </a>

                                            </div>
                                        </div>

                                    @else
                                        <div class="slick">

                                            <div class="estiloscardgolestr">
                                                <a href="{{ route('teams.show', ['league_slug' => $leagueSlug, 'tournament_slug' => $defaultTournament,'team_slug'=>$top10clube->teams->slug]) }}">
                                                    <h4 class="titlefotojugadores"><small style="margin-top: 13px;"
                                                            class="nomtotal">{{ Str::limit($top10clube->teams->name, 15) }}</small></h4>
                                                    @if($top10clube->teams->logo!=null)
                                                        <img src="{{asset('uploads/teams/'.$top10clube->teams->logo) }}" alt="Image"
                                                            class="ffdfdf">
                                                    @else
                                                        @php
                                                            $imagenes = File::allFiles(public_path('uploads/logoteams/'));
                                                            $imagenAleatoria = collect($imagenes)->random();
                                                        @endphp

                                                        @if ($imagenAleatoria)
                                                            <img src="{{ asset('uploads/logoteams/' . $imagenAleatoria->getFilename()) }}" alt="Descripción de la imagen" class="ffdfdf" style="
                                                            width: 77%;
                                                            /* display: flex !important; */
                                                            /* align-items: center !important; */
                                                            /* justify-content: center !important; */
                                                            margin-left: 30px !important;
                                                        ">
                                                        @else
                                                            <p>No se encontraron imágenes.</p>
                                                        @endif
                                                        {{--  <img src="{{asset('assets/img/favicon/favicon.png') }}" alt="Image" class="ffdfdf">  --}}
                                                    @endif


                                                    <div class="estiloscardgoles"></div>
                                                    <div class="cuadritoposicion">
                                                        <span class="textoindicadoresgol"><b>{{ $loop->iteration }}</b></span>
                                                        <span class="textoindicadoresgol2"><b>POS</b></span>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    @endif

                                @endforeach
                                {{--  <div id="noDataContainer">
                                    @if ($top10clubes->isEmpty())
                                        <div class="nohaypartidosprogramadosdsd heartbeat"  style="opacity: 1;width: 100%;transform: translate3d(0px, 0px, 0px);display: flex;justify-content: center;align-items: center;">
                                            <div>

                                                <p class="sintop10"> Aun no hay ranking del top 10 de los mejores equipos del
                                                    torneo {{ $league->name }}</p>
                                                <img src="{{asset('assets/img/bancas.svg') }}" class="fototop10">

                                            </div>

                                        </div>
                                    @endif
                                </div>  --}}

                                    @if ($top10clubes->isEmpty())
                                        <div class="nohaypartidosprogramadosdsd heartbeat"  style="opacity: 1;width: 100%;transform: translate3d(0px, 0px, 0px);display: flex;justify-content: center;align-items: center;">
                                            <div>

                                                <p class="sintop10"> Aun no hay ranking del top 10 de los mejores equipos del
                                                    torneo {{ $league->name }}</p>
                                                <img src="{{asset('assets/img/bancas.svg') }}" class="fototop10">

                                            </div>

                                        </div>
                                    @endif

                            </div>


                        <h3 class="titulogoleador" style="width: 100% !important; ">Top 10 de los Mejores Clubes</h3>
                    </div>


                </div>




        </div>

        <div class="contenedorcaruselgoleadoresf">
            <div class="row rowconte">

                <div class="col-md-3 contenedorhijo">
                    <div class="contenedorinformaciontorneo rotate-in-center">
                        <div class="contendoricontorneo">
                            <i class="font-ligadago icontorneo">
                                <img src="{{asset('assets/img/web/equipos.webp') }}" class="icontorneooficial">
                            </i>

                        </div>

                        <div class="textoinformaciontorneo">
                            <div class="contenedortextoinfo">
                                <p class="contentorneo totalequipos">
                                    <b>
                                        @if($tournament->teams->count()!=null)

                                            {{$tournament->teams->count()}}

                                        @else
                                            0
                                        @endif
                                    </b>
                                </p>
                                <p class="contentorneo textequipo">
                                    Equipos
                                </p>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-md-3 contenedorhijo contenedorhijov2 rotate-in-center">
                    <div class="contenedorinformaciontorneogg">
                        <div class="contendoricontorneo">
                            <i class="font-ligadago icontorneo">
                                <img src="{{asset('assets/img/web/silbatofutbol.webp') }}" class="icontorneooficialsilbato">
                            </i>

                        </div>

                        <div class="textoinformaciontorneo">
                            <div class="contenedortextoinfo">
                                <p class="contentorneo totalequipos">
                                    <b>
                                        @if($matchsFinish->count()!=null)

                                            {{$matchsFinish->count() }}

                                        @else
                                            0
                                        @endif
                                    </b>
                                </p>
                                <p class="contentorneo textequipo">
                                    Partidos Jugados
                                </p>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-md-3 contenedorhijo contenedorhijov2 rotate-in-center">
                    <div class="contenedorinformaciontorneo">
                        <div class="contendoricontorneo">
                            <i class="font-ligadago icontorneo">
                                <img src="{{asset('assets/img/web/golesfutbol.webp') }}" class="icontorneooficialgolfutbol">
                            </i>

                        </div>

                        <div class="textoinformaciontorneo">
                            <div class="contenedortextoinfo">
                                <p class="contentorneo totalequipos">
                                    <b>
                                        @if($sumaTotalGoles!=null)

                                            {{$sumaTotalGoles}}

                                        @else
                                            0
                                        @endif

                                    </b>
                                </p>
                                <p class="contentorneo textequipo">
                                    Goles
                                </p>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-md-3 contenedorhijo contenedorhijov2 rotate-in-center">
                    <div class="contenedorinformaciontorneobb">
                        <div class="contendoricontorneo">
                            <i class="font-ligadago icontorneo">
                                <img src="{{asset('assets/img/web/calendariofutbol.webp') }}"
                                    class="icontorneooficialcalendario">
                            </i>

                        </div>

                        <div class="textoinformaciontorneo">
                            <div class="contenedortextoinfo">
                                <p class="contentorneo totalequipos">
                                    <b>
                                        @if($fechasJugadas!=null)

                                            {{$fechasJugadas}}

                                        @else
                                            0
                                        @endif

                                    </b>
                                </p>
                                <p class="contentorneo textequipo">
                                    Fechas
                                </p>
                            </div>

                        </div>
                    </div>
                </div>

            </div>

        </div>

        <div class="carouselInfotorneo" data-flickity='{ "autoPlay": true, "prevNextButtons": false, "pageDots": false }' style="font-family: Abel;font-size: 15px;width: 80%;align-items: center;margin-left: 10%;">

            <div class="carousel-cellinfo">
                <div class="contenedorinformaciontorneocarrusel ">
                    <div class="contendoricontorneo">
                        <i class="font-ligadago icontorneo">
                            <img src="{{asset('assets/img/web/equipos.webp') }}" class="icontorneooficial">
                        </i>

                    </div>

                    <div class="textoinformaciontorneo">
                        <div class="contenedortextoinfo">
                            <p class="contentorneo totalequipos">
                                <b>
                                    @if($tournament->teams->count()!=null)

                                        {{$tournament->teams->count()}}

                                    @else
                                        0
                                    @endif
                                </b>
                            </p>
                            <p class="contentorneo textequipo">
                                Equipos
                            </p>
                        </div>

                    </div>
                </div>
            </div>

            <div class="carousel-cellinfo">
                <div class="contenedorinformaciontorneocarrusel">
                    <div class="contendoricontorneo">
                        <i class="font-ligadago icontorneo">
                            <img src="{{asset('assets/img/web/silbatofutbol.webp') }}" class="icontorneooficialsilbato">
                        </i>

                    </div>

                    <div class="textoinformaciontorneo">
                        <div class="contenedortextoinfo">
                            <p class="contentorneo totalequipos">
                                <b>
                                    @if($matchsFinish->count()!=null)

                                        {{$matchsFinish->count() }}

                                    @else
                                        0
                                    @endif
                                </b>
                            </p>
                            <p class="contentorneo textequipo">
                                Partidos Jugados
                            </p>
                        </div>

                    </div>
                </div>
            </div>

            <div class="carousel-cellinfo">
                <div class="contenedorinformaciontorneocarrusel">
                    <div class="contendoricontorneo">
                        <i class="font-ligadago icontorneo">
                            <img src="{{asset('assets/img/web/golesfutbol.webp') }}" class="icontorneooficialgolfutbol">
                        </i>

                    </div>

                    <div class="textoinformaciontorneo">
                        <div class="contenedortextoinfo">
                            <p class="contentorneo totalequipos">
                                <b>
                                    @if($sumaTotalGoles!=null)

                                        {{$sumaTotalGoles}}

                                    @else
                                        0
                                    @endif

                                </b>
                            </p>
                            <p class="contentorneo textequipo">
                                Goles
                            </p>
                        </div>

                    </div>
                </div>
            </div>

            <div class="carousel-cellinfo">
                <div class="contenedorinformaciontorneocarrusel">
                    <div class="contendoricontorneo">
                        <i class="font-ligadago icontorneo">
                            <img src="{{asset('assets/img/web/calendariofutbol.webp') }}"
                                class="icontorneooficialcalendario">
                        </i>

                    </div>

                    <div class="textoinformaciontorneo">
                        <div class="contenedortextoinfo">
                            <p class="contentorneo totalequipos">
                                <b>
                                    @if($fechasJugadas!=null)

                                        {{$fechasJugadas}}

                                    @else
                                        0
                                    @endif

                                </b>


                            </p>
                            <p class="contentorneo textequipo">
                                Fechas
                            </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="footer ">
            <div class="container-xl flex-grow-1 container-p-y">
                <div class="selectposition">
                    <div class="col-md-4">

                        <div class="contenedorligahome">
                            <div class="listagoleadoresdsd" style="height: 347%">



                                <div class="tab-content" id="myTabContent" style="padding: 0;">
                                    <ul class="nav nav-tabs nav-gruposdsd" id="myTab" role="tablist" style="
                                    background-color: transparent;">
                                        @foreach ($groupPoints as $points)
                                            <li class="nav-item ordenliguepoints" role="presentation">
                                                <button class="nav-link {{ $loop->first ? 'active' : '' }}"
                                                        id="grupo4-{{ $points->group_id }}-tab" data-bs-toggle="tab"
                                                        data-bs-target="#grupo4-{{ $points->group_id }}" type="button" role="tab"
                                                        aria-controls="home-tab-pane" aria-selected="false"
                                                        tabindex="-1">{{ $points->group->name }}</button>
                                            </li>
                                        @endforeach
                                    </ul>

                                    @forelse ($groupPoints as $points)

                                        <div class="tab-pane fade {{ $loop->first ? 'active show ' : '' }}"
                                            id="grupo4-{{ $points->group_id }}" role="tabpanel"
                                            aria-labelledby="grupo4-{{ $points->group_id }}-tab" tabindex="-1">
                                            <h3 class="titulogrupohome"><span>{{__('Top Ten Points Table')}}</span>
                                                <span>{{ $points->group->name }}</span></h3>

                                            {{--  <h3 class="titulogrupohome"><span>{{__('Points table')}}</span>
                                                <span>{{ $points->group->name }}</span></h3>  --}}
                                            <section  class="">
                                                <table class="diseñotablapuntos table_body table-striped table-hover">
                                                                <thead class="bordes">
                                                                <tr class="barrainfoligaposicionesdd">
                                                                    <th scope="col" class="posiciontablaff">#</th>
                                                                    <th scope="col" class="posiciontablaff">{{__('Team')}}</th>
                                                                    <th scope="col" class="posiciontablaff">PJ</th>
                                                                    <th scope="col" class="posiciontablaff">DG</th>
                                                                    <th scope="col" class="posiciontablaff">PTS</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                @foreach ($teamPointsByGroup[$points->group_id] as $teamPoint)

                                                                        <tr class="infoposiciontorneo">


                                                                                <td class="teamshomedata posiciongoleadordsd" >{{ $loop->iteration }}</td>
                                                                                <td class="teamequipogeneralhome ligaposition">
                                                                                        <div class="tamanoletraequipo">
                                                                                            <div class="shield-mobile modocel textcenter">
                                                                                                @if($teamPoint->teams->logo!=null)
                                                                                                    <img
                                                                                                        src="{{asset('uploads/teams/'.$teamPoint->teams->logo) }}"
                                                                                                        class="fotosequipostablageneral">
                                                                                                @else
                                                                                                    @php
                                                                                                        $imagenes = File::allFiles(public_path('uploads/logoteams/'));
                                                                                                        $imagenAleatoria = collect($imagenes)->random();
                                                                                                    @endphp
                                                                                                    <div class="avatar-wrapper m-1">
                                                                                                        <div class="avatar avatar-sm">
                                                                                                            @if ($imagenAleatoria)
                                                                                                                <img src="{{ asset('uploads/logoteams/' . $imagenAleatoria->getFilename()) }}" alt="Descripción de la imagen" style="width: 85% !important;height: 90% !important;">
                                                                                                            @else
                                                                                                                <p>No se encontraron imágenes.</p>
                                                                                                            @endif
                                                                                                        </div>
                                                                                                    </div>
                                                                                                @endif
                                                                                                <a>{{ substr($teamPoint->teams->name, 0, 3) }}</a>
                                                                                            </div>
                                                                                            <div class="shield-desktop modocel">
                                                                                                @if($teamPoint->teams->logo!=null)
                                                                                                    <img
                                                                                                        src="{{asset('uploads/teams/'.$teamPoint->teams->logo) }}"
                                                                                                        class="fotosequipostablageneral">
                                                                                                @else
                                                                                                    <div class="avatar-wrapper m-1">
                                                                                                        <div class="avatar avatar-sm">
                                                                                                            @if ($imagenAleatoria)
                                                                                                                <img src="{{ asset('uploads/logoteams/' . $imagenAleatoria->getFilename()) }}" alt="Descripción de la imagen" style="width: 85% !important;height: 90% !important;">
                                                                                                            @else
                                                                                                                <p>No se encontraron imágenes.</p>
                                                                                                            @endif
                                                                                                        </div>
                                                                                                    </div>
                                                                                                @endif
                                                                                                <a href="{{ route('teams.show', ['league_slug' => $leagueSlug, 'tournament_slug' => $defaultTournament,'team_slug'=>$teamPoint->teams->slug]) }}" class="tipoletratabla">{{ $teamPoint->teams->name }}</a>
                                                                                            </div>
                                                                                        </div>

                                                                                </td>
                                                                                <td class="teamshome contengeneralsdsd">{{ $teamPoint->matches_played }}</td>
                                                                                <td class="teamshome contengeneralsdsd">{{$teamPoint->goals_difference}}</td>
                                                                                <td class="teamshome contengeneralsdsd negrillapuntos">{{ $teamPoint->total_points }}</td>



                                                                        </tr>

                                                                @endforeach
                                                                </tbody>
                                                </table>

                                            </section>
                                        </div>
                                    @empty
                                        <div class="row h-100">
                                            <div class="col-md-12 text-center" style="
                                            margin-top: 23px;">
                                                <h4>No hay tabla de puntos disponible</h4>
                                            </div>
                                        </div>
                                    @endforelse
                                </div>
                                <ul class="navbar-nav" id="barra-navegacion">

                                    <li class="nav-item  menus {{Route::is('teams.*')?'active':''}}">
                                        <a href="{{ route('points.table.view', ['league_slug' => $leagueSlug, 'tournament_slug' => $defaultTournament]) }}"
                                        class="top-stats__button global-btn" style="
                                                        width: 100%;">
                                            <span class="verlistacompleta">Ver Tabla de Puntos </span>
                                            <div class="btnfulllista">
                                                <img src="{{asset('assets/img/btnfulllista.png') }}"
                                                    class="btnfulllistaimg">
                                            </div>
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </div>


                    </div>



                    <div class="col-md-8">
                        <div class="selectpositionv2">

                            <!--GOLEADORES DEL TORNEO-->


                            <div class="column2liga">
                                <!--lista goleadores-->


                                <div class="top-stats">
                                    <header>
                                        <h4 class="top-stats__title">
                                            <a href="">Goleadores</a>

                                        </h4>
                                    </header>

                                    <div class="top-stats__wrapper">


                                        <ul class="ggrg" style="background: #000000d4;">
                                            @if($goleadorDestacado)

                                                <li class="top-stats__hero t43" type="button" class="btn btn-primary  boton-transparente" data-bs-toggle="modal" data-bs-target="#animationModalindex{{ $goleadorDestacado->player_id }}" >
                                                    <a class="top-stats__hero-link">
                                                        {{--  <div class="top-stats__hero-pos iteraction-fixed" >{{ $loop->iteration }}</div>  --}}
                                                        @if($goleadorDestacado->player->profile_photo!=null)
                                                            <div class="top-stats__hero-image " >
                                                                <img
                                                                    src="{{asset('uploads/players/'.$goleadorDestacado->player->profile_photo) }}"
                                                                    class="img statcardImg" >
                                                            </div>

                                                        @else
                                                            <div class="top-stats__hero-image " >
                                                                <img src="{{asset('assets/img/favicon/jugador-de-futbol2.png') }}"
                                                                    class="img statcardImg" style="
                                                                    height: 85% !important;
                                                                ">
                                                            </div>
                                                        @endif
                                                        <div class="top-stats__hero-stats">
                                                            @php
                                                                $nombres = explode(' ', $goleadorDestacado->player->first_name);
                                                                $primerNombre = $nombres[0];
                                                                $apellidos= explode(' ', $goleadorDestacado->player->last_name);
                                                                $primerapellido = $apellidos[0];
                                                            @endphp

                                                            <div class="top-stats__hero-info ps-0">

                                                                @php
                                                                    $imagenes = File::allFiles(public_path('uploads/logoteamscolor/'));
                                                                    $imagenAleatoria = collect($imagenes)->random();
                                                                @endphp


                                                                <div class="top-stats__hero-club-info ">

                                                                    @if($goleadorDestacado->game_team->logo!=null)
                                                                        <div class="badgenm badge-image-container">
                                                                            <img
                                                                                src="{{asset('uploads/teams/'.$goleadorDestacado->game_team->logo) }}"
                                                                                class="badge-image js-badge-image">
                                                                        </div>
                                                                    @else

                                                                        @if ($imagenAleatoria)
                                                                            <img src="{{ asset('uploads/logoteamscolor/' . $imagenAleatoria->getFilename()) }}" alt="Descripción de la imagen" class="badge-image js-badge-image">
                                                                        @else
                                                                            <p>No se encontraron imágenes.</p>
                                                                        @endif

                                                                        {{--  <div class="badgenm badge-image-container">
                                                                            <img
                                                                                src="{{asset('assets/img/favicon/favicon.png') }}"
                                                                                class="badge-image js-badge-image">
                                                                        </div>  --}}
                                                                    @endif



                                                                    @if($goleadorDestacado->game_team->name!=null)
                                                                        <div class="top-stats__hero-club-name">
                                                                            <span
                                                                                class="nombreclubgoleador line-clamp-2" style="font-family: Abel; font-size: 16px;">{{$goleadorDestacado->game_team->name }}</span>
                                                                        </div>
                                                                    @else

                                                                        <div class="top-stats__hero-club-name">
                                                                            <span
                                                                                class="nombreclubgoleador">Sin Nombre</span>
                                                                        </div>
                                                                    @endif

                                                                </div>
                                                                @if($primerNombre!=null)

                                                                    <div class="top-stats__hero-first">
                                                                        {{ $primerNombre }}
                                                                    </div>

                                                                @else
                                                                    <div class="top-stats__hero-first">
                                                                        Sin Nombre
                                                                    </div>
                                                                @endif


                                                                @if($primerapellido!=null)

                                                                    <div class="top-stats__hero-last">
                                                                        {{ $primerapellido }}
                                                                    </div>
                                                                @else
                                                                    <div class="top-stats__hero-first">
                                                                        Sin Apellido
                                                                    </div>
                                                                @endif


                                                            </div>

                                                            <div class="text-end d-flex justify-content-end">
                                                                @if($goleadorDestacado->total_goles!=null)
                                                                    <div class="top-stats__hero-stat">
                                                                        {{$goleadorDestacado->total_goles}}
                                                                    </div>
                                                                @else
                                                                    <div class="top-stats__hero-stat">
                                                                    0
                                                                    </div>

                                                                @endif
                                                            </div>



                                                        </div>
                                                    </a>
                                                    @include('frontend.modalPerfilJugadorindex.index')
                                                </li>
                                            @else

                                                @php $cumpleCondicionsingoleadores = true; @endphp

                                                @if (!isset($cumpleCondicionsingoleadores))
                                                    <div class="nohaypartidosprogramados heartbeat">
                                                        <p class="sinpartido"> No hay tabla de Goleadores Disponible</p>
                                                        <img src="{{asset('assets/img/golesj.svg') }}" class="icononohaypartido">
                                                    </div>

                                                @endif

                                            @endif

                                            @forelse ($goleadores as $goleador)
                                                @php
                                                    $nombres = explode(' ', $goleador->player->first_name);
                                                    $primerNombrelegue = $nombres[0];
                                                    $apellidos= explode(' ', $goleador->player->last_name);
                                                    $primerapellidolegue = $apellidos[0];
                                                @endphp
                                                <li class="top-stats__row top-stats__row--" type="button" class="btn btn-primary  boton-transparente" data-bs-toggle="modal" data-bs-target="#animationModalpos{{ $goleador->player_id }}">

                                                    <div class="top-stats__row-info">
                                                        <div class="top-stats__row-pos">{{ $loop->iteration }}</div>
                                                        @if($goleador->game_team->logo!=null)
                                                            <div class="badge badge-image-container">
                                                                <img
                                                                    src="{{asset('uploads/teams/'.$goleador->game_team->logo) }}"
                                                                    class="badge-image js-badge-image">
                                                            </div>
                                                        @else
                                                            @php
                                                                $imagenes = File::allFiles(public_path('uploads/logoteams/'));
                                                                $imagenAleatoriacolor = collect($imagenes)->random();
                                                            @endphp
                                                            <div class="badge badge-image-container">

                                                                @if ($imagenAleatoriacolor)
                                                                    <img src="{{ asset('uploads/logoteams/' . $imagenAleatoriacolor->getFilename()) }}" alt="Descripción de la imagen" class="badge-image js-badge-image">
                                                                @else
                                                                    <p>No se encontraron imágenes.</p>
                                                                @endif




                                                                {{--  <img src="{{asset('assets/img/favicon/favicon.png') }}"
                                                                    class="badge-image js-badge-image">--}}
                                                            </div>
                                                        @endif

                                                        <div class="top-stats__row-team-info">

                                                            <a class="top-stats__row-name" style="color: rgb(255, 255, 255)">
                                                                {{ $primerNombrelegue }} {{ $primerapellidolegue }}
                                                                {{--  {{ $goleador->player->player_name }}  --}}
                                                            </a>


                                                            @if($goleador->game_team->name!=null)
                                                                <a href="{{ route('teams.show', ['league_slug' => $leagueSlug, 'tournament_slug' => $defaultTournament,'team_slug'=>$goleador->game_team->slug]) }}" class="top-stats__row-team-name">
                                                                    {{ Str::limit($goleador->game_team->name, 15) }}

                                                                </a>

                                                            @else
                                                                <span class="top-stats__row-team-name">Sin Nombre</span>
                                                            @endif

                                                        </div>
                                                    </div>


                                                    @if($goleador->total_goles!=null)
                                                        <div class="top-stats__row-stat">
                                                            {{$goleador->total_goles}}
                                                        </div>
                                                    @else
                                                        <div class="top-stats__row-stat">
                                                            -
                                                        </div>
                                                    @endif

                                                </li>
                                                @include('frontend.modalperfiljugadorpos.index')

                                            @empty
                                                <div class="nohaypartidosprogramados heartbeat">
                                                    <p class="sinpartido"> No hay tabla de Goleadores Disponible</p>
                                                    <img src="{{asset('assets/img/golesj.svg') }}" class="icononohaypartido">
                                                </div>

                                            @endforelse




                                        </ul>
                                        <ul class="navbar-nav" id="barra-navegacion">

                                            <li class="nav-item  menus {{Route::is('teams.*')?'active':''}}">
                                                <a href="{{ route('TablaGoleadores.view', ['league_slug' => $leagueSlug, 'tournament_slug' => $defaultTournament]) }}"
                                                class="top-stats__button global-btn" style="
                                                                width: 100%;">
                                                    <span class="verlistacompleta" style="min-width: 9rem;">Ver Tabla de Goleadores</span>
                                                    <div class="btnfulllista">
                                                        <img src="{{asset('assets/img/btnfulllista.png') }}"
                                                            class="btnfulllistaimg">
                                                    </div>
                                                </a>
                                            </li>

                                        </ul>


                                    </div>

                                </div>

                            </div>


                            <!--VALLA MENOS VENCIDA DEL TORNEO-->
                            <div class="column2liga">
                                <div class="top-stats">
                                    <header>
                                        <h4 class="top-stats__title">
                                            <a href="" class="titlestats">Valla menos vencida</a>

                                        </h4>
                                    </header>

                                    <div class="top-stats__wrapper">
                                        <ul class="ggrg" style="
                                        background: #000000d4;
                                        ">
                                            @foreach ($vallamenosvencidas as $vallamenosvencida)
                                            @if ($loop->iteration <= 5)
                                                @if($vallamenosvencida === $vallamenosvencidaDestacado)

                                                    <li class="top-stats__hero t43  ">
                                                        <svg class="top-stats__svg-decoration" viewBox="300 130 800 100"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg"
                                                            preserveAspectRatio="xMidYMid meet">
                                                            <defs>
                                                                <linearGradient id="top-stats__hero_t43_goals" x1="671.5"
                                                                                y1="-2543.5" x2="2774.42" y2="-903.522"
                                                                                gradientUnits="userSpaceOnUse">
                                                                    <stop offset="32.55%" stop-color="#FFF"></stop>
                                                                    <stop offset="64.38%" stop-color="#F5F2F5"></stop>
                                                                </linearGradient>
                                                            </defs>

                                                            <path
                                                                d="M1476.18 343.773C1417.62 314.292 1359.88 282.402 1303.25 247.956H1370.01C1238.91 168.211 1113.73 74.8191 997.693 -33.3461H1053.33C1037.45 -48.144 1021.68 -63.1311 1006.15 -78.4882C930.279 -153.539 860.623 -232.469 797.157 -314.639H841.666C772.051 -404.776 709.962 -498.833 655.282 -595.941H688.664C637.256 -687.236 592.418 -781.22 554.223 -877.242H576.478C543.418 -960.341 515.278 -1044.94 492.109 -1130.61L520.117 -1158.54C554.586 -1062.74 595.542 -968.768 642.869 -877.242H620.615C670.679 -780.455 727.914 -686.422 792.377 -595.941H758.995C829.022 -497.649 907.547 -403.542 994.602 -314.639H950.093C959.003 -305.547 967.971 -296.487 977.054 -287.501C1073.1 -192.49 1175.92 -107.911 1283.7 -33.3378H1228.07C1356.01 55.1788 1490.99 129.53 1630.08 190.268L1476.18 343.781V343.773ZM1448.17 371.708C1309.06 310.97 1174.09 236.619 1046.15 148.102H1101.78C994.008 73.5283 891.194 -11.0503 795.138 -106.062C786.055 -115.047 777.079 -124.107 768.177 -133.199H812.686C725.63 -222.103 647.106 -316.21 577.079 -414.501H610.461C545.997 -504.982 488.763 -599.007 438.699 -695.803H460.953C413.618 -787.328 372.67 -881.304 338.201 -977.104L310.193 -949.169C333.362 -863.505 361.502 -778.901 394.562 -695.803H372.307C410.51 -599.78 455.349 -505.796 506.748 -414.501H473.366C528.046 -317.393 590.143 -223.336 659.75 -133.199H615.241C678.707 -51.0295 748.363 27.9094 824.233 102.952C839.762 118.309 855.529 133.296 871.412 148.094H815.776C931.82 256.25 1057 349.651 1188.1 429.395H1121.34C1177.97 463.842 1235.71 495.731 1294.26 525.212L1448.17 371.7V371.708ZM1812 8.81189C1672.89 -51.9257 1537.93 -126.277 1409.98 -214.794H1465.62C1357.84 -289.368 1255.03 -373.946 1158.97 -468.958C1149.89 -477.943 1140.91 -487.003 1132.01 -496.096H1176.52C1089.46 -584.999 1010.94 -679.105 940.911 -777.397H974.293C909.83 -867.878 852.595 -961.903 802.531 -1058.7H824.785C777.45 -1150.22 736.502 -1244.2 702.033 -1340L674.025 -1312.06C697.194 -1226.4 725.334 -1141.8 758.394 -1058.7H736.139C774.342 -962.676 819.181 -868.692 870.58 -777.397H837.198C891.878 -680.289 953.975 -586.232 1023.58 -496.096H979.073C1042.54 -413.926 1112.19 -334.987 1188.07 -259.944C1203.59 -244.587 1219.36 -229.6 1235.24 -214.802H1179.61C1295.65 -106.645 1420.83 -13.2455 1551.93 66.4993H1485.17C1541.8 100.946 1599.54 132.835 1658.09 162.316L1812 8.80359V8.81189ZM901.983 916.487C762.877 855.75 627.91 781.398 499.964 692.882H555.6C447.823 618.308 345.009 533.729 248.953 438.718C239.87 429.732 230.894 420.673 221.992 411.58H266.501C179.445 322.677 100.921 228.57 30.8943 130.279H64.2756C-0.187485 39.7971 -57.4221 -54.2277 -107.486 -151.023H-85.2316C-132.567 -242.548 -173.515 -336.524 -207.984 -432.324L-236 -404.381C-212.831 -318.717 -184.692 -234.114 -151.632 -151.015H-173.886C-135.683 -54.9922 -90.8447 38.9915 -39.4456 130.287H-72.827C-18.1475 227.395 43.9501 321.452 113.556 411.588H69.0479C132.514 493.758 202.169 572.697 278.04 647.74C293.568 663.097 309.336 678.084 325.219 692.882H269.583C385.627 801.038 510.803 894.438 641.905 974.183H575.142C631.775 1008.63 689.513 1040.52 748.066 1070L901.975 916.487H901.983ZM1265.81 553.592C1126.71 492.854 991.742 418.502 863.796 329.986H919.432C811.655 255.412 708.841 170.833 612.785 75.822C603.702 66.8364 594.726 57.7767 585.824 48.6842H630.333C543.277 -40.2189 464.753 -134.326 394.726 -232.617H428.108C363.645 -323.099 306.41 -417.124 256.346 -513.919H278.6C231.265 -605.444 190.317 -699.42 155.848 -795.22L127.84 -767.285C151.009 -681.621 179.149 -597.018 212.209 -513.919H189.954C228.157 -417.896 272.996 -323.913 324.395 -232.617H291.013C345.693 -135.51 407.79 -41.452 477.397 48.6842H432.888C496.354 130.854 566.01 209.793 641.88 284.835C657.409 300.192 673.176 315.18 689.059 329.978H633.424C749.467 438.134 874.643 531.534 1005.75 611.279H938.983C995.616 645.725 1053.35 677.615 1111.91 707.096L1265.81 553.583V553.592ZM1083.9 735.04C944.793 674.302 809.826 599.95 681.88 511.434H737.516C629.739 436.86 526.925 352.281 430.869 257.27C421.786 248.284 412.81 239.225 403.908 230.132H448.417C361.361 141.229 282.837 47.1221 212.81 -51.1694H246.192C181.729 -141.651 124.494 -235.676 74.4301 -332.471H96.6844C49.3488 -423.996 8.401 -517.972 -26.0683 -613.772L-54.0757 -585.837C-30.9066 -500.173 -2.76733 -415.57 30.2926 -332.471H8.03833C46.2414 -236.448 91.0796 -142.465 142.479 -51.1694H109.097C163.777 45.9382 225.874 139.996 295.481 230.132H250.972C314.438 312.302 384.094 391.241 459.964 466.283C475.493 481.641 491.26 496.627 507.143 511.425H451.508C567.551 619.582 692.727 712.982 823.829 792.727H757.067C813.699 827.173 871.437 859.063 929.99 888.544L1083.9 735.031V735.04Z"
                                                                fill="url(#top-stats__hero_t43_goals)"></path>
                                                        </svg>

                                                        <a href="{{ route('teams.show', ['league_slug' => $leagueSlug, 'tournament_slug' => $defaultTournament,'team_slug'=>$vallamenosvencida->teams->slug]) }}" class="top-stats__hero-link">
                                                            {{--  <div class="top-stats__hero-pos iteraction-fixed">{{ $loop->iteration }}</div>  --}}
                                                            @if($vallamenosvencida->teams->logo!=null)
                                                                <div class="top-stats__vencida-image ">
                                                                    <img
                                                                        src="{{asset('uploads/teams/'.$vallamenosvencida->teams->logo) }}"
                                                                        class="img statcardImg">
                                                                </div>

                                                            @else
                                                                <div class="top-stats__vencida-image " style="
                                                                    display: flex;
                                                                    justify-content: center;
                                                                    align-items: center;
                                                                ">

                                                                    @if ($imagenAleatoria)
                                                                        <img src="{{ asset('uploads/logoteamscolor/' . $imagenAleatoria->getFilename()) }}" alt="Descripción de la imagen" class="img statcardImg" style="
                                                                        width: 80%;
                                                                    ">
                                                                    @else
                                                                        <p>No se encontraron imágenes.</p>
                                                                    @endif

                                                                    {{--  <img src="{{asset('assets/img/favicon/favicon.png') }}"
                                                                        class="img statcardImg">  --}}
                                                                </div>

                                                            @endif
                                                            <div class="top-stats__vencida-stats">

                                                                <div class="top-stats__hero-info">


                                                                    <div class="top-stats__hero-club-infos">


                                                                        @if($vallamenosvencida->teams->name!=null)
                                                                            <div class="top-stats__hero-lastd">

                                                                                {{ Str::limit($vallamenosvencida->teams->name, 15) }}
                                                                            </div>

                                                                        @else
                                                                            <div class="top-stats__hero-lastd">
                                                                                Sin Nombre
                                                                            </div>
                                                                        @endif

                                                                    </div>
                                                                </div>

                                                                <div class="top-stats__hero-stat">
                                                                    {{$vallamenosvencida->goals_against}}
                                                                </div>

                                                                {{--  <div class="text-end d-flex justify-content-end">
                                                                    @if($vallamenosvencida->goals_against!=null)
                                                                        <div class="top-stats__hero-stat">
                                                                            {{$vallamenosvencida->goals_against}}
                                                                        </div>
                                                                    @else
                                                                        <div class="top-stats__hero-stat">
                                                                            -
                                                                        </div>

                                                                    @endif
                                                                </div>  --}}



                                                            </div>



                                                        </a>
                                                    </li>

                                                @else


                                                    @php $cumpleCondicionsinarqueros = true; @endphp

                                                @endif
                                            @else
                                            @break
                                            @endif
                                            <li class="top-stats__row top-stats__row--">

                                                <div class="top-stats__row-info">
                                                    <div class="top-stats__row-pos">{{ $loop->iteration }}</div>

                                                    @if($vallamenosvencida->teams->logo!=null)
                                                        <div class="badge badge-image-container">
                                                            <img
                                                                src="{{asset('uploads/teams/'.$vallamenosvencida->teams->logo) }}"
                                                                class="badge-image js-badge-image">
                                                        </div>
                                                    @else
                                                        <div class="badge badge-image-container">
                                                            @php
                                                                $imagenes = File::allFiles(public_path('uploads/logoteams/'));
                                                                $imagenAleatoria = collect($imagenes)->random();
                                                            @endphp

                                                            @if ($imagenAleatoria)
                                                                <img src="{{ asset('uploads/logoteams/' . $imagenAleatoria->getFilename()) }}" alt="Descripción de la imagen" class="badge-image js-badge-image">
                                                            @else
                                                                <p>No se encontraron imágenes.</p>
                                                            @endif

                                                            {{--  <img src="{{asset('assets/img/favicon/favicon.png') }}"
                                                                class="badge-image js-badge-image">  --}}
                                                        </div>
                                                    @endif

                                                        <div class="top-stats__row-team-info">

                                                            @if($vallamenosvencida->teams->name!=null)

                                                                <a href="{{ route('teams.show', ['league_slug' => $leagueSlug, 'tournament_slug' => $defaultTournament,'team_slug'=>$vallamenosvencida->teams->slug]) }}" class="top-stats__row-name">
                                                                    {{ Str::limit($vallamenosvencida->teams->name, 15) }}

                                                                </a>

                                                            @else
                                                                <span class="top-stats__row-name">Sin Nombre</span>
                                                            @endif
                                                        </div>

                                                </div>




                                                <div class="top-stats__row-stat">
                                                    {{$vallamenosvencida->goals_against}}
                                                </div>
                                                {{--  @if($vallamenosvencida->goals_against!=null)
                                                    <div class="top-stats__row-stat">
                                                        {{$vallamenosvencida->goals_against}}
                                                    </div>
                                                @else
                                                    <div class="top-stats__row-stat">
                                                        hola
                                                    </div>

                                                @endif  --}}
                                            </li>
                                            @endforeach

                                            @if (!isset($cumpleCondicionsinarqueros))
                                                <div class="nohaypartidosprogramados heartbeat" >
                                                    <p class="sinpartido"> No hay tabla de vallas menos vencida Disponible</p>
                                                    <img src="{{asset('assets/img/arquero.svg') }}" class="icononohaypartido">
                                                </div>
                                            @endif


                                        </ul>
                                        <a href="{{ route('tablavallamenosvencida.view', ['league_slug' => $leagueSlug, 'tournament_slug' => $defaultTournament]) }}"
                                        class="top-stats__button global-btn" style="
                                                width: 100%;">
                                            <span class="verlistacompleta" style="min-width: 12rem;">Ver Tabla de Valla menos vencida</span>
                                            <div class="btnfulllista">
                                                <img src="{{asset('assets/img/btnfulllista.png') }}" class="btnfulllistaimg">
                                            </div>

                                        </a>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>


@endsection
