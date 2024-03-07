@extends('frontend.layouts.app')
@section('title',$team->name)

@section('content')

    <!-- Pantalla de carga -->
    @include('frontend.layouts.partials.bannermifutbolequipo')
    @include('frontend.layouts.partials.sponsors')
    <div class="infoequipoliga">
        <div class="datosequipoliga">
            <div class="informacionprincipal">
                <div class="datosligastop">
                    <div class="container">
                        <div class="row d-flex justify-content-center align-items-center text-center" style="margin-top: 10px !important">
                            <div class="col-md-4 ">
                                    @if($team->logo!=null)
                                            <img src="{{asset('uploads/teams/'.$team->logo) }}" class="img-fluid modecelteamsshowescudo">
                                    @else

                                        @php
                                            $imagenes = File::allFiles(public_path('uploads/logoteams/'));
                                            $imagenAleatoria = collect($imagenes)->random();
                                        @endphp

                                        @if ($imagenAleatoria)
                                            <img src="{{ asset('uploads/logoteams/' . $imagenAleatoria->getFilename()) }}" alt="Descripción de la imagen"  class="img-fluid modecelteamsshow">
                                        @else
                                            <p>No se encontraron imágenes.</p>
                                        @endif

                                        {{--  <img src="{{asset('assets/img/favicon/favicon.png') }}" alt="Avatar"
                                             class="img-fluid modecelteamsshow" >  --}}
                                    @endif
                            </div>
                            <div class="col-md-8">
                                <div class="datosprincipalesclub">
                                    <h1 class="nombreclub">
                                        {{$team->name}}
                                    </h1>
                                    <table class="dataprincipal">
                                        <tbody class="sinhover">
                                        <tr>
                                            <td>
                                                <p class="descriptionclub">Año de fundación</p>
                                            </td>
                                            <td>
                                                <p class="descriptionclub">{{__('Number of players')}}</p>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <p class="datosdelclub">{{$team->year_created}}</p>
                                            </td>
                                            <td>
                                                <p class="datosdelclub">{{ $playersCountTeams[$team->id] }}</p>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <p class="descriptionclub">Presidente</p>
                                            </td>
                                            <td>
                                                <p class="descriptionclub">Web Oficial</p>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <p class="datosdelclub">
                                                @if ($team->owner)
                                                    {{$team->owner->name}}
                                                @else
                                                    {{__('N/A')}}
                                                @endif</p>
                                            </td>
                                            <td>
                                                <p class="datosdelclub">N/A</p>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                            </td>
                                            <td>
                                                <div class="espaciopublicidadclub">
                                                    <a href="#" class="fa-brands fa-facebook"></a>
                                                    <a href="#" class="fa-brands fa-instagram"></a>
                                                    <a href="#" class="fa-brands fa-twitter"></a>
                                                    <a href="#" class="fa-brands fa-youtube"></a>
                                                    <a href="#" class="fa-brands fa-tiktok"></a>
                                                </div>
                                            </td>
                                        </tr>

                                        </tbody>

                                    </table>


                                </div>
                            </div>
                        </div>



{{--                        <div class="imagencampo">--}}
{{--                            @if($tournament->image!=null)--}}
{{--                                <div class="fotocanchas">--}}
{{--                                    <img src="{{asset('uploads/tournaments/'.$tournament->image) }}" class="fotocancha">--}}
{{--                                </div>--}}
{{--                            @else--}}
{{--                                <div class="avatar avatar-lgbv">--}}
{{--                                    <span--}}
{{--                                        class="avatar-initial rounded-circle bg-label-primaryb">{{$league->name[0]}}</span>--}}
{{--                                </div>--}}
{{--                            @endif--}}
{{--                        </div>--}}
                    </div>
                </div>


            </div>

        </div>

        <div class="background-league">
            <div class="content">
                <div class="listaplantilla" style="" >

                    <div class="listadojugadores jugadoresclub">


                        <div class="container-fluid flex-grow-1 container-p-y">
                            <ul class="nav nav-tabs nav-grupos" id="myTab" role="tablist">
                                <li class="nav-item ordendatos" role="presentation">
                                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                            data-bs-target="#home-tab-pane" type="button" role="tab"
                                            aria-controls="home-tab-pane" aria-selected="true">PLANTILLA
                                    </button>
                                </li>
                                <li class="nav-item ordendatos" role="presentation">
                                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab"
                                            data-bs-target="#profile-tab-pane" type="button" role="tab"
                                            aria-controls="profile-tab-pane" aria-selected="false">FIXTURE
                                    </button>
                                </li>
                                <li class="nav-item ordendatos" role="presentation">
                                    <button class="nav-link" id="contact-tab" data-bs-toggle="tab"
                                            data-bs-target="#contact-tab-pane" type="button" role="tab"
                                            aria-controls="contact-tab-pane" aria-selected="false">ESTADÍSTICAS
                                    </button>
                                </li>

                            </ul>

                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel"
                                     aria-labelledby="home-tab" tabindex="0">
                                    <div class="jugadoresclub titleclub py-1 rounded">
                                        <h1 class="tituloplantilla mb-0">Plantilla oficial del {{$team->name}} 2022/23</h1>
                                    </div>

                                    <div class="plantillaprincial">
                                        <div class="jugadoresprincipaleees">

                                            <div class="listadosjugadoreeees">
                                                <div class="directorDT">
                                                    <div class="contenedorDT">
                                                        <div class="titleDT">
                                                            <h4 class="">
                                                                Cuerpo Técnico
                                                            </h4>
                                                        </div>

                                                        <div class="row">
                                                            @if($team->technical->isEmpty())
                                                                <div class="col-md-12">
                                                                    <div class=notificacionnohayDT>
                                                                        <div class="cuadronotificacionDT">
                                                                            <h5 class="nohayDT">No hay listas de Cuerpo Técnico</h5>
                                                                        </div>
                                                                    </div>
                                                                </div>


                                                            @else
                                                                @foreach($team->technical as $technical)
                                                                    <div class="col-md-3 my-2">
                                                                        <div class="DtPrincipal">
                                                                            <div class="DtPrincipalequipo">
                                                                                <a href="" class="fotoentrenador">
                                                                                    <div class="contenedorfotoDT">


                                                                                        @if($technical->image!=null)

                                                                                            <div class="fotodtprincial">
                                                                                                <img
                                                                                                    src="{{asset('uploads/technicals/'.$technical->image) }}"
                                                                                                    alt="" class="DTPR">
                                                                                            </div>
                                                                                        @else
                                                                                            <div class="avatar-wrapper d-flex justify-content-center">
                                                                                                <div class="avatar avatar-xxl">
                                                                                                    <img src="{{asset('assets/img/favicon/jugador-de-futbol2.png') }}" alt="Avatar" class="">
                                                                                                </div>
                                                                                            </div>

                                                                                        @endif


                                                                                    </div>
                                                                                </a>
                                                                                <div class="fichatecnicadt">
                                                                                    <div class="nombreDT">
                                                                                            @php
                                                                                                $nombres = explode(' ', $technical->name);
                                                                                                $primerNombre = $nombres[0];
                                                                                                $apellidos= explode(' ',  $technical->lastname);
                                                                                                $primerapellido = $apellidos[0];
                                                                                            @endphp
                                                                                        <div class="">
                                                                                            <p class="nameDT mb-0">{{$primerNombre}} {{$primerapellido}}</p>
                                                                                            <p class="countrydt mb-0">{{$technical->role->name}}</p>
                                                                                        </div>

                                                                                    </div>

                                                                                </div>

                                                                            </div>

                                                                        </div>
                                                                    </div>

                                                                @endforeach
                                                            @endif
                                                        </div>

                                                    </div>
                                                </div>

                                                @foreach($positions as $position)
                                                    <div class="desplieguejugadores">

                                                        <div class="arqueros">
                                                            <div class="arquerosequip">
                                                                <div class="listadosarqueros">
                                                                    <h4 class="">{{$position->name}}</h4>
                                                                </div>

                                                                <div class="row">

                                                                    @if($players->isEmpty())
                                                                        <div class="col-md-12">
                                                                            <div class=notificacionnohayjugador>
                                                                                <div class="cuadronotificacionjugadores">
                                                                                    <h5 class="nohay">No hay listas de
                                                                                        jugadores</h5>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @else

                                                                        @foreach($players as $player)
                                                                            @if($player->position_id == $position->id)
                                                                                <div class="col-md-3 my-2">
                                                                                    <div class="listarqueros">
                                                                                        <div class="arquerostp">

                                                                                            <div class="fotoarquero">
                                                                                                @php
                                                                                                    $nombres = explode(' ', $player->first_name);
                                                                                                    $primerNombre = $nombres[0];
                                                                                                    $apellidos= explode(' ',  $player->last_name);
                                                                                                    $primerapellido = $apellidos[0];
                                                                                                @endphp

                                                                                                <!-- Botón transparente -->

                                                                                                @if($player->profile_photo!=null)
                                                                                                <div class="avatar-wrapper d-flex justify-content-center" type="button" class="btn btn-primary  boton-transparente" data-bs-toggle="modal" data-bs-target="#animationModal{{ $player->id }}">

                                                                                                    <img src="{{asset('uploads/players/'.$player->profile_photo)}}" alt="Avatar" class="fotojugadorclub">

                                                                                                </div>
                                                                                                @else
                                                                                                    <div class="avatar-wrapper d-flex justify-content-center" type="button" class="btn btn-primary  boton-transparente" data-bs-toggle="modal" data-bs-target="#animationModal{{ $player->id }}">
                                                                                                        <div class="avatar avatar-xxl" style=" width: 11rem !important;
                                                                                                        height: 11rem !important;">
                                                                                                            <img src="{{asset('assets/img/favicon/jugador-de-futbol2.png') }}" alt="Avatar">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                @endif

                                                                                                {{--  <button type="button" class="btn btn-primary  boton-transparente" data-bs-toggle="modal" data-bs-target="#animationModal{{ $player->id }}" style="height: 100%;">

                                                                                                </button>  --}}




                                                                                            </div>


                                                                                            <div class="descripcionarquero">



                                                                                                <div class="namearquero">
                                                                                                    <div class="">
                                                                                                        <p class="nameprincipalaquero d-block m-0">
                                                                                                            {{$primerNombre}} {{$primerapellido}}
                                                                                                        </p>


                                                                                                        {{--  @if($player->player_name!=null)
                                                                                                            <p class="nameprincipalaquero d-block m-0">
                                                                                                                {{$primerNombre}} {{$primerapellido}}
                                                                                                            </p>
                                                                                                        @else
                                                                                                            <p class="nameprincipalaquero d-block m-0">
                                                                                                                Falta Nombre
                                                                                                            </p>
                                                                                                        @endif  --}}



                                                                                                        {{--                                                                                                    @if($player->player_name!=null)--}}
                                                                                                        {{--                                                                                                        <p class="posicionprincialarquero">--}}
                                                                                                        {{--                                                                                                            {{$position->name}}--}}
                                                                                                        {{--                                                                                                        </p>--}}
                                                                                                        {{--                                                                                                    @else--}}
                                                                                                        {{--                                                                                                        <p class="nameprincipalaquero">--}}
                                                                                                        {{--                                                                                                            Falta Equipo--}}
                                                                                                        {{--                                                                                                        </p>--}}
                                                                                                        {{--                                                                                                    @endif--}}

                                                                                                    </div>

                                                                                                    <div class="numeroarquero">

                                                                                                        @if($player->player_number!=null)
                                                                                                            <p class="numerarquero">
                                                                                                                {{$player->player_number}}
                                                                                                            </p>
                                                                                                        @else
                                                                                                            <div class="sinnumeroplayers">
                                                                                                                <i class="fa-solid fa-hashtag fa-xl" style="color: #030303;"></i>
                                                                                                            </div>


                                                                                                        @endif


                                                                                                    </div>

                                                                                                </div>



                                                                                            </div>

                                                                                        </div>

                                                                                    </div>
                                                                                </div>
                                                                                @include('frontend.modalPerfilJugador.index')
                                                                            @endif

                                                                        @endforeach
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                @endforeach

                                            </div>
                                        </div>

                                        <div class="jugadoresprincipaleees">
                                            <!-- tabla de goles -->
                                            <h3 class="titulogruposrr">Tabla De Goleadores de {{$team->name}}</h3>


                                            @foreach ($goleadores as $goleador)
                                                @if($jugadorGoleadorDestacado->id == $goleadorDestacado->player->id)
                                                    <div class="cardjudagor">
                                                        <div class="cardjugadorW1">

                                                            <a class="link">
                                                                <div class="cardjugadorw2">

                                                                    @if($goleador->player->profile_photo!=null)

                                                                        <div class="jugadores">
                                                                            <img
                                                                                src="{{asset('uploads/players/'.$goleador->player->profile_photo) }}"
                                                                                class="fotojugadoress">
                                                                        </div>
                                                                    @else
                                                                        <div class="jugadores">
                                                                            <img
                                                                                src="{{asset('assets/img/favicon/jugador-de-futbol2.png') }}"
                                                                                class="fotojugadoress">
                                                                        </div>
                                                                    @endif


                                                                </div>

                                                            </a>

                                                        </div>

                                                        <div class="infofut">
                                                            <p class="infofutg">
                                                                Maximo Goleador
                                                            </p>
                                                            <div class="infofutK">
                                                            </div>
                                                            <div class="infofutB">

                                                                @if($goleador->game_team->logo!=null)

                                                                    <div class="infofutn">
                                                                                    {{--                                                                        <div>--}}
                                                                                    {{--                                                                            <img--}}
                                                                                    {{--                                                                                src="{{asset('uploads/teams/'.$goleador->game_team->logo) }}"--}}
                                                                                    {{--                                                                                class="fotoequipojugador">--}}
                                                                                    {{--                                                                        </div>--}}

                                                                        <div>
                                                                            <img src="{{asset('assets/img/colombia.png') }}"
                                                                                 class="paisjugador">
                                                                        </div>

                                                                    </div>

                                                                @else

                                                                    <div class="infofutn">
                                                                        <div>
                                                                            <img
                                                                                src="{{asset('assets/img/favicon/favicon.png') }}"
                                                                                class="fotoequipojugador">
                                                                        </div>

                                                                        <div>
                                                                            <img src="{{asset('assets/img/colombia.png') }}"
                                                                                 class="paisjugador">
                                                                        </div>

                                                                    </div>

                                                                @endif

                                                            </div>

                                                        </div>

                                                        <div class="fondofut">
                                                            <div>
                                                                <img src="{{asset('assets/img/Recurso1textura.svg') }}"
                                                                     class="fondofutbolito">
                                                            </div>
                                                        </div>
                                                        <div class="tablefdf">
                                                            <table class="tablagoles tablacolor">

                                                                <tbody>

                                                                <tr>
                                                                        {{--                                                                    <td>{{ $loop->iteration }}</td>--}}
                                                                    <td class="team">
                                                                        <a>
                                                                                                {{--                                                                            @if($goleador->game_team->logo!=null)--}}
                                                                                                {{--                                                                                <span>--}}
                                                                                                {{--                                                                                                    <img--}}
                                                                                                {{--                                                                                                        src="{{asset('uploads/teams/'.$goleador->game_team->logo) }}"--}}
                                                                                                {{--                                                                                                        class="fotosequiposgoleadores">--}}
                                                                                                {{--                                                                                                </span>--}}
                                                                                                {{--                                                                            @else--}}

                                                                                                {{--                                                                                <span>--}}
                                                                                                {{--                                                                                                    <img--}}
                                                                                                {{--                                                                                                        src="{{asset('assets/img/favicon/favicon.png') }}"--}}
                                                                                                {{--                                                                                                        class="fotosequiposgoleadores">--}}
                                                                                                {{--                                                                                                </span>--}}
                                                                                                {{--
                                                                                                                                                      @endif--}}

                                                                                @php
                                                                                    $nombresplayers = explode(' ', $goleador->player->first_name);
                                                                                    $primerNombreplayer = $nombresplayers[0];
                                                                                    $apellidosplayers= explode(' ',  $goleador->player->last_name);
                                                                                    $primerapellidoplayer = $apellidosplayers[0];
                                                                                @endphp

                                                                                {{$primerNombreplayer}} {{$primerapellidoplayer}}
                                                                              {{--  @if($goleador->player->player_name!=null)
                                                                                {{ $goleador->player->player_name }}


                                                                            @else
                                                                                Sin Nombre
                                                                            @endif  --}}
                                                                        </a>


                                                                    </td>
                                                                    <td class="teams">

                                                                        @if($goleador->total_goles!=null)
                                                                            {{$goleador->total_goles}}
                                                                        @else
                                                                            -
                                                                        @endif

                                                                    </td>

                                                                </tr>


                                                                </tbody>
                                                            </table>
                                                        </div>




                                                    </div>

                                                    @php $cumpleCondicion = true; @endphp
                                                @endif
                                            @endforeach
                                            @if (!isset($cumpleCondicion))
                                                <div class="nohaygolesequipo">
                                                    <p class="singoles"> Aun no hay Tabla de Goleadores en el
                                                        equipo {{$team->name}}</p>
                                                    <img src="{{asset('assets/img/banca.svg') }}" class="icononohaygoleadores">
                                                </div>
                                            @endif






                                            <!-- tabla de Amarillas -->

                                            <h3 class="titulogruposrr">Tabla De Tarjetas Amarillas de {{$team->name}}</h3>
                                            @foreach ($amonestacionamarillas as $amonestacionamarilla)

                                                @if($jugadorAmarilla && $amarillasjugadores && $amarillasjugadores->player)
                                                    @if($jugadorAmarilla->id == $amarillasjugadores->player->id)
                                                        <!-- Tu código aquí -->
                                                    @endif
                                                @endif

                                                @if($jugadorAmarilla->id == $amarillasjugadores->player->id)
                                                    <div class="cardjudagor">
                                                        <div class="cardjugadorW1">

                                                            <a class="link">
                                                                <div class="cardjugadorw2">

                                                                    @if($amonestacionamarilla->player->profile_photo!=null)

                                                                        <div class="jugadores">
                                                                            <img
                                                                                src="{{asset('uploads/players/'.$amonestacionamarilla->player->profile_photo) }}"
                                                                                class="fotojugadoress">
                                                                        </div>
                                                                    @else
                                                                        <div class="jugadores">
                                                                            <img
                                                                                src="{{asset('assets/img/favicon/jugador-de-futbol2.png') }}"
                                                                                class="fotojugadoress">
                                                                        </div>
                                                                    @endif


                                                                </div>

                                                            </a>

                                                        </div>

                                                        <div class="infofut">
                                                            <p class="infofutg">
                                                                Amonestacion Amarillas
                                                            </p>
                                                            <div class="infofutK">
                                                            </div>
                                                            <div class="infofutB">

                                                                @if($amonestacionamarilla->game_team->logo!=null)

                                                                    <div class="infofutn">
                                                                        {{--                                                                        <div>--}}
                                                                        {{--                                                                            <img--}}
                                                                        {{--                                                                                src="{{asset('uploads/teams/'.$amonestacionamarilla->game_team->logo) }}"--}}
                                                                        {{--                                                                                class="fotoequipojugador">--}}
                                                                        {{--                                                                        </div>--}}

                                                                        <div>
                                                                            <img src="{{asset('assets/img/colombia.png') }}"
                                                                                 class="paisjugador">
                                                                        </div>

                                                                    </div>

                                                                @else

                                                                    <div class="infofutn">
                                                                                {{--                                                                        <div>--}}
                                                                                {{--                                                                            <img--}}
                                                                                {{--                                                                                src="{{asset('assets/img/favicon/favicon.png') }}"--}}
                                                                                {{--                                                                                class="fotoequipojugador">--}}
                                                                                {{--                                                                        </div>--}}

                                                                        <div>
                                                                            <img src="{{asset('assets/img/colombia.png') }}"
                                                                                 class="paisjugador">
                                                                        </div>

                                                                    </div>

                                                                @endif

                                                            </div>

                                                        </div>

                                                        <div class="fondofut">
                                                            <div>
                                                                <img src="{{asset('assets/img/Recurso1textura.svg') }}"
                                                                     class="fondofutbolito">
                                                            </div>
                                                        </div>


                                                        <div class="tablefdf">
                                                            <table class="tablagoles tablacolor">

                                                                <tbody>

                                                                <tr>
                                                                    {{--                                                                    <td>{{ $loop->iteration }}</td>--}}
                                                                    <td class="team">
                                                                        <a>
                                                                            {{--                                                                            @if($amonestacionamarilla->game_team->logo!=null)--}}
                                                                            {{--                                                                                <span>--}}
                                                                            {{--                                                                                                    <img--}}
                                                                            {{--                                                                                                        src="{{asset('uploads/teams/'.$amonestacionamarilla->game_team->logo) }}"--}}
                                                                            {{--                                                                                                        class="fotosequiposgoleadores">--}}
                                                                            {{--                                                                                                </span>--}}
                                                                            {{--                                                                            @else--}}

                                                                            {{--                                                                                <span>--}}
                                                                            {{--                                                                                                    <img--}}
                                                                            {{--                                                                                                        src="{{asset('assets/img/favicon/favicon.png') }}"--}}
                                                                            {{--                                                                                                        class="fotosequiposgoleadores">--}}
                                                                            {{--                                                                                                </span>--}}
                                                                            {{--
                                                                                                                                                  @endif--}}

                                                                            @php
                                                                                $nombresplayersyellow = explode(' ', $amonestacionamarilla->player->first_name);
                                                                                $primerNombreplayeryellow = $nombresplayersyellow[0];
                                                                                $apellidosplayersyellow= explode(' ',  $amonestacionamarilla->player->last_name);
                                                                                $primerapellidoplayeryellow = $apellidosplayersyellow[0];
                                                                            @endphp



                                                                            {{$primerNombreplayeryellow}} {{$primerapellidoplayeryellow}}
                                                                            {{--  @if($amonestacionamarilla->player->player_name!=null)
                                                                                {{ $amonestacionamarilla->player->player_name }}
                                                                            @else
                                                                                Sin Nombre
                                                                            @endif  --}}
                                                                        </a>


                                                                    </td>
                                                                    <td class="teams">

                                                                        @if($amonestacionamarilla->total_yellow!=null)
                                                                            {{$amonestacionamarilla->total_yellow}}
                                                                        @else
                                                                            -
                                                                        @endif

                                                                    </td>

                                                                </tr>


                                                                </tbody>
                                                            </table>
                                                        </div>



                                                    </div>

                                                    @php $cumpleCondicionamarillas = true; @endphp
                                                @endif
                                            @endforeach

                                            @if (!isset($cumpleCondicionamarillas))
                                                <div class="nohaygolesequipo">
                                                    <p class="singoles">Aun no hay Tabla de Amonestaciones Amarillas en el
                                                        equipo {{$team->name}}</p>
                                                    <img src="{{asset('assets/img/tarjetaverde.svg') }}"
                                                         class="icononohaygoleadores">
                                                </div>
                                            @endif

                                            <!-- tabla de Rojas -->

                                            <h3 class="titulogruposrr">Tabla De Tarjetas Rojas de {{$team->name}}</h3>
                                            @foreach ($amonestacionRojas as $amonestacionRoja)
                                                @if($jugadorRoja->id == $Rojasjugadores->player->id)
                                                    <div class="cardjudagor">
                                                        <div class="cardjugadorW1">
                                                            <a class="link">
                                                                <div class="cardjugadorw2">
                                                                    @if($amonestacionRoja->player->profile_photo!=null)
                                                                        <div class="jugadores">
                                                                            <img
                                                                                src="{{asset('uploads/players/'.$amonestacionRoja->player->profile_photo) }}"
                                                                                class="fotojugadoress">
                                                                        </div>
                                                                    @else
                                                                        <div class="jugadores">
                                                                            <img
                                                                                src="{{asset('assets/img/favicon/jugador-de-futbol2.png') }}"
                                                                                class="fotojugadoress">
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            </a>
                                                        </div>
                                                        <div class="infofut">
                                                            <p class="infofutg">
                                                                Amonestacion Rojas
                                                            </p>
                                                            <div class="infofutK">
                                                            </div>
                                                            <div class="infofutB">

                                                                @if($amonestacionRoja->game_team->logo!=null)

                                                                    <div class="infofutn">
                                                                            {{--                                                                        <div>--}}
                                                                            {{--                                                                            <img--}}
                                                                            {{--                                                                                src="{{asset('uploads/teams/'.$amonestacionRoja->game_team->logo) }}"--}}
                                                                            {{--                                                                                class="fotoequipojugador">--}}
                                                                            {{--                                                                        </div>--}}

                                                                        <div>
                                                                            <img src="{{asset('assets/img/colombia.png') }}"
                                                                                 class="paisjugador">
                                                                        </div>

                                                                    </div>

                                                                @else

                                                                    <div class="infofutn">
                                                                            {{--                                                                        <div>--}}
                                                                            {{--                                                                            <img--}}
                                                                            {{--                                                                                src="{{asset('assets/img/favicon/favicon.png') }}"--}}
                                                                            {{--                                                                                class="fotoequipojugador">--}}
                                                                            {{--                                                                        </div>--}}

                                                                        <div>
                                                                            <img src="{{asset('assets/img/colombia.png') }}"
                                                                                 class="paisjugador">
                                                                        </div>

                                                                    </div>

                                                                @endif

                                                            </div>

                                                        </div>
                                                        <div class="fondofut">
                                                            <div>
                                                                <img src="{{asset('assets/img/Recurso1textura.svg') }}"
                                                                     class="fondofutbolito">
                                                            </div>
                                                        </div>
                                                        <div class="tablefdf">
                                                            <table class="tablagoles tablacolor">

                                                                <tbody>

                                                                <tr>
                                                                    {{--                                                                    <td>{{ $loop->iteration }}</td>--}}
                                                                    <td class="team">
                                                                        <a>
                                                                            {{--                                                                            @if($amonestacionRoja->game_team->logo!=null)--}}
                                                                            {{--                                                                                <span>--}}
                                                                            {{--                                                                                         <img--}}
                                                                            {{--                                                                                             src="{{asset('uploads/teams/'.$amonestacionRoja->game_team->logo) }}"--}}
                                                                            {{--                                                                                             class="fotosequiposgoleadores">--}}
                                                                            {{--                                                                                     </span>--}}
                                                                            {{--                                                                            @else--}}

                                                                            {{--                                                                                <span>--}}
                                                                            {{--                                                                                         <img--}}
                                                                            {{--                                                                                             src="{{asset('assets/img/favicon/favicon.png') }}"--}}
                                                                            {{--                                                                                             class="fotosequiposgoleadores">--}}
                                                                            {{--                                                                                     </span>--}}
                                                                            {{--
                                                                                                                                                        @endif--}}



                                                                            @php
                                                                                $nombresplayersred = explode(' ', $amonestacionRoja->player->first_name);
                                                                                $primerNombreplayerred = $nombresplayersred[0];
                                                                                $apellidosplayersred= explode(' ',  $amonestacionRoja->player->last_name);
                                                                                $primerapellidoplayerred = $apellidosplayersred[0];
                                                                            @endphp

                                                                            {{$primerNombreplayerred}} {{$primerapellidoplayerred}}


                                                                            {{--  @if($amonestacionRoja->player->player_name!=null)
                                                                                {{ $amonestacionRoja->player->player_name }}
                                                                            @else
                                                                                Sin Nombre
                                                                            @endif  --}}
                                                                        </a>


                                                                    </td>
                                                                    <td class="teams">

                                                                        @if($amonestacionRoja->total_red!=null)
                                                                            {{$amonestacionRoja->total_red}}
                                                                        @else
                                                                            -
                                                                        @endif

                                                                    </td>

                                                                </tr>


                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    @php $cumpleCondicionRojas = true; @endphp
                                                @endif
                                            @endforeach

                                            @if (!isset($cumpleCondicionRojas))
                                                <div class="nohaygolesequipo ">
                                                    <p class="singoles"> Aun no hay Tabla de Amonestaciones Rojas en el
                                                        equipo {{$team->name}}</p>
                                                    <img src="{{asset('assets/img/tarjetaroja.svg') }}"
                                                         class="icononohaygoleadores">
                                                </div>
                                            @endif


                                        </div>

                                    </div>
                                </div>

                                <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab"
                                     tabindex="0">

                                    <div class="bannerfondo">
                                        <div class="contendoresdepartidosclub">
                                            <div class="encabezado titulopartidos">
                                                <h1 class="titulopartidoos">
                                                    Últimos resultados del {{$team->name}} en La Liga Dago
                                                </h1>
                                            </div>
                                            <div class="tablapartidosclub">
                                                <div class="contenedorpartidos">
                                                    <div class="tablatotalpartidos">
                                                        <div class="contenpatidostotal">
                                                            <div class="componentv2 componentv4 componentv6 ">

                                                            </div>
                                                            <section  class="table  table_body">
                                                                <table class="tablee  tablagolesliga table_body table-striped table-hover partidosclubes">
                                                                    <thead>
                                                                    <tr class="barraopcionespartidos">
                                                                        <th class="descriptablapartidos">


                                                                            <span class="label">FECHA</span>
                                                                        </th>

                                                                        <th class="descriptablapartidos">


                                                                            <span class="label">HORA</span>
                                                                        </th>

                                                                        <th class="descriptablapartidos">


                                                                            <span class="label">PARTIDO</span>
                                                                        </th>

                                                                        <th class="descriptablapartidos">

                                                                            <span class="label">ARBITRO</span>
                                                                        </th>

                                                                        <th class="descriptablapartidos">

                                                                            <span class="label">CANCHA</span>
                                                                        </th>



                                                                        <th class="descriptablapartidos">
                                                                            <span class="label">ESTADO</span>
                                                                        </th>

                                                                        <th class="descriptablapartidos">

                                                                            <span class="label">TRANSMISIÓN</span>
                                                                        </th>
                                                                        {{--  <th class="descriptablapartidos">

                                                                        </th>  --}}

                                                                    </tr>

                                                                    </thead>

                                                                    <tbody>

                                                                    @foreach ($matches as $matche)
                                                                        <tr class="descripcionesspartido">

                                                                            <td class="descrip1 tablepartidoo">
                                                                                <p class="fechapartido">{{ $matche->date }}</p>
                                                                            </td>

                                                                            <td class="descrip2 tablepartidoo1">
                                                                                <p class="horapartido">{{ $matche->hour }}</p>
                                                                                <i data-tip="Hora central Europea (CET)"
                                                                                   class="varhora font-ligadago"></i>
                                                                            </td>

                                                                            <td class="descrip3 tablepartidoo2">
                                                                                <div class="partidosoficiales">
                                                                                    <div class="clubespartidos">
                                                                                        <a href="">
                                                                                            @php
                                                                                                $imagenes = File::allFiles(public_path('uploads/logoteams/'));
                                                                                                $imagenAleatoria = collect($imagenes)->random();
                                                                                            @endphp
                                                                                            <div class="cluboficiales">
                                                                                                @if($matche->team_one->logo!=null)

                                                                                                    <img
                                                                                                        src="{{asset('uploads/teams/'.$matche->team_one->logo) }}"
                                                                                                        class="iconclubesliga size-xs">
                                                                                                    <div class="textoequipo1">
                                                                                                        <p class="nameclub">{{ Str::limit($matche->team_one->name, 15) }}</p>
                                                                                                    </div>

                                                                                                @else

                                                                                                @if ($imagenAleatoria)
                                                                                                    <img src="{{ asset('uploads/logoteams/' . $imagenAleatoria->getFilename()) }}" alt="Descripción de la imagen" class="iconclubesliga size-xs">
                                                                                                @else
                                                                                                    <p>No se encontraron imágenes.</p>
                                                                                                @endif

                                                                                                    {{--  <img src="{{asset('assets/img/favicon/favicon.png') }}" class="iconclubesliga size-xs">  --}}
                                                                                                    <div class="textoequipo1">
                                                                                                        <p class="nameclub">{{ Str::limit($matche->team_one->name, 15) }}</p>
                                                                                                    </div>

                                                                                                @endif


                                                                                            </div>
                                                                                        </a>
                                                                                    </div>

                                                                                    <div class="clubespartidosgf">

                                                                                        {{--  <div class="live">
                                                                                            @if($matche->results!=null )

                                                                                                @if($matche->results->team_one_score!=null)

                                                                                                    <p class="marcadores">{{$matche->results->team_one_score}}</p>
                                                                                                    <p class="marcadores">-</p>
                                                                                                    <p class="marcadores">{{$matche->results->team_two_score}}</p>

                                                                                                @else
                                                                                                    <p class="marcadores">Vs</p>
                                                                                                @endif

                                                                                            @else

                                                                                                <p class="marcadores">Vs</p>
                                                                                            @endif


                                                                                        </div>  --}}

                                                                                        <div class="live">
                                                                                            @if($matche->results && $matche->results->team_one_score !== null && $matche->results->team_two_score !== null)
                                                                                                <p class="marcadores">{{$matche->results->team_one_score}} - {{$matche->results->team_two_score}}</p>
                                                                                            @else
                                                                                                <p class="marcadores">Vs</p>
                                                                                            @endif
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="clubespartidos">
                                                                                        <a href="">
                                                                                            <div class="cluboficialesop2">

                                                                                                @if($matche->team_two->logo!=null)

                                                                                                    <img
                                                                                                        src="{{asset('uploads/teams/'.$matche->team_two->logo) }}"
                                                                                                        class="iconclubesliga size-xs">
                                                                                                    <div class="textoequipo2">
                                                                                                        <p class="nameclub">{{ Str::limit($matche->team_two->name, 15) }}</p>
                                                                                                    </div>

                                                                                                @else

                                                                                                    @if ($imagenAleatoria)
                                                                                                        <img src="{{ asset('uploads/logoteams/' . $imagenAleatoria->getFilename()) }}" alt="Descripción de la imagen" class="iconclubesliga size-xs">
                                                                                                    @else
                                                                                                        <p>No se encontraron imágenes.</p>
                                                                                                    @endif

                                                                                                    {{--  <img
                                                                                                        src="{{asset('assets/img/favicon/favicon.png') }}"
                                                                                                        class="iconclubesliga size-xs">  --}}
                                                                                                    <div class="textoequipo2">
                                                                                                        <p class="nameclub">{{ Str::limit($matche->team_two->name, 15) }}</p>
                                                                                                    </div>

                                                                                                @endif


                                                                                            </div>
                                                                                        </a>
                                                                                    </div>

                                                                                </div>
                                                                            </td>

                                                                            <td class="competicionliga">
                                                                                <p class="titulocompeticion">
                                                                                    {{$matche->arbitrator->name}}  {{$matche->arbitrator->lastname}}
                                                                                </p>
                                                                            </td>

                                                                            <td class="competicionligacancha">
                                                                                <p class="titulocompeticion">
                                                                                    {{$matche->canchasjuego->name}}
                                                                                </p>
                                                                            </td>

                                                                            <td class="competicionligacancha">
                                                                                <p class="titulocompeticion">
                                                                                    {{$matche->status->name}}
                                                                                </p>
                                                                            </td>

                                                                            <td class="verpartido">
                                                                                @if($league->image!=null)

                                                                                    <p class="tituloverpartido">
                                                                                        -
                                                                                    </p>

                                                                                @else

                                                                                    <p class="tituloverpartido">
                                                                                        Sin transmision
                                                                                    </p>

                                                                                @endif

                                                                            </td>

                                                                            {{--  <td class="resumenpartido partidoresumen">
                                                                                <a href="{{ route('Resumenpartido.view', ['league_slug' => $league->slug, 'tournament_slug' => $tournament->slug, 'id_partido' => $matche->id]) }}">
                                                                                    <i class=" estadisttticas font-ligadago "><img
                                                                                            src="{{asset('assets/img/flecha.png') }}"
                                                                                            class="iconpartidoclubes"></i>
                                                                                </a>
                                                                            </td>  --}}


                                                                        </tr>


                                                                    @endforeach
                                                                    </tbody>

                                                                </table>


                                                            @forelse($matches as $match )


                                                                <div class="containerProgramado czlpZsmovil">

                                                                    <div class="contenedor-partido">
                                                                        <div class="info-partido" style="display: grid;">
                                                                            <span class="titulomovilprogramado">Fecha</span>
                                                                            <span class="texntomovilprogramado"> {{ $match->date }}</span>
                                                                        </div>


                                                                        <div class="info-partido" style="border-left: 1px solid white;display: grid;">
                                                                            <span class="titulomovilprogramado">Hora</span>
                                                                            <span class="texntomovilprogramado">{{ $match->hour }}</span>
                                                                        </div>

                                                                    </div>

                                                                    <div class="contenedor-equipos">

                                                                        <div class="clubespartidosmovil">
                                                                            <a href="">
                                                                                    @if($match->team_one->logo!=null)

                                                                                        <img src="{{asset('uploads/teams/'.$match->team_one->logo) }}" class="iconclubesligamovil size-xs">

                                                                                        <div class="textoequipo1movil">
                                                                                            <p class="nameclubmovil">{{ Str::limit($match->team_one->name, 10) }}</p>
                                                                                        </div>

                                                                                    @else

                                                                                        @if ($imagenAleatoria)
                                                                                            <img src="{{ asset('uploads/logoteams/' . $imagenAleatoria->getFilename()) }}" alt="Descripción de la imagen" class="iconclubesligamovil size-xs">
                                                                                        @else
                                                                                            <p>No se encontraron imágenes.</p>
                                                                                        @endif

                                                                                        {{--  <img src="{{asset('assets/img/favicon/favicon.png') }}" class="iconclubesligamovil size-xs">  --}}
                                                                                        <div class="textoequipo1movil">
                                                                                            <p class="nameclubmovil">{{ Str::limit($match->team_one->name, 10) }} </p>
                                                                                        </div>

                                                                                    @endif

                                                                            </a>
                                                                        </div>

                                                                        <div class="VSresultado">


                                                                            @if($match->results!=null)
                                                                                @if($match->results->team_one_score!=null)

                                                                                <div class="live">

                                                                                        <p class="marcadores">{{$match->results->team_one_score}}</p>
                                                                                        <p class="marcadores">-</p>
                                                                                        <p class="marcadores">{{$match->results->team_two_score}}</p>

                                                                                </div>
                                                                                @else
                                                                                <p class="marcadores">Vs</p>
                                                                            @endif

                                                                            @else

                                                                                <p class="marcadores">Vs</p>
                                                                            @endif



                                                                        </div>

                                                                        <div class="clubespartidosmovil">
                                                                            <a href="">


                                                                                    @if($match->team_two->logo!=null)

                                                                                        <img
                                                                                            src="{{asset('uploads/teams/'.$match->team_two->logo) }}"
                                                                                            class="iconclubesligamovil size-xs">
                                                                                        <div class="textoequipo2movil">
                                                                                            <p class="nameclubmovil">{{ Str::limit($match->team_two->name, 10) }}</p>
                                                                                        </div>

                                                                                    @else

                                                                                        @if ($imagenAleatoria)
                                                                                            <img src="{{ asset('uploads/logoteams/' . $imagenAleatoria->getFilename()) }}" alt="Descripción de la imagen" class="iconclubesligamovil size-xs">
                                                                                        @else
                                                                                            <p>No se encontraron imágenes.</p>
                                                                                        @endif

                                                                                        {{--  <img
                                                                                            src="{{asset('assets/img/favicon/favicon.png') }}"
                                                                                            class="iconclubesligamovil size-xs">  --}}
                                                                                        <div class="textoequipo2movil">
                                                                                            <p class="nameclubmovil">{{ Str::limit($match->team_two->name, 10) }}</p>
                                                                                        </div>

                                                                                    @endif



                                                                            </a>
                                                                        </div>

                                                                    </div>

                                                                    <div class="contenedor-horizontal">
                                                                        {{--  <div class="elemento">
                                                                            <button type="button" class="btn btn-primary infopartidoverMovil" data-bs-toggle="modal" data-bs-target="#animationModal{{ $match->id }}" style="height: 42px;width: 50%;">
                                                                               <span style="margin-right: 5px;">Detalles</span> <i class="fa-sharp fa-solid fa-list-ul fa-lg" style="color: #080808;"></i></i>
                                                                            </button>
                                                                        </div>  --}}
                                                                        {{--  <div class="elemento">
                                                                            <a href="{{ route('Resumenpartido.view', ['league_slug' => $league->slug, 'tournament_slug' => $tournament->slug, 'id_partido' => $match->id]) }}">

                                                                                <button class="infopartidoverMovil">
                                                                                    <span style="margin-right: 5px;">Partido</span> <i class="fa-sharp fa-regular fa-circle-right fa-xl"></i></button>
                                                                            </a>
                                                                        </div>  --}}
                                                                    </div>


                                                                </div>
                                                                @include('frontend.modalinfopartidoResultado.index')
                                                            @empty
                                                                <p class="nohaypartidomovil">No hay partido</p>
                                                            @endforelse


                                                            </section>

                                                        </div>

                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    </div>


                                </div>

                                <div class="tab-pane fade conteee" id="contact-tab-pane" role="tabpanel"
                                     aria-labelledby="contact-tab" tabindex="0">

                                    <div class="datosequiposcontroldatos">
                                        <div class="datosequipposcontrol">
                                            <div class="contenedorEstadisticas">
                                                <div class="contenedorEstadisticasgrupo">
                                                    <h1 class="titleestadistica">Líderes y estadísticas generales
                                                        del {{$team->name}}</h1>
                                                    <div class="table  table_body">
                                                        <div class="dataclubesss" data-tabs="true">
                                                            <div class="datosprincipaleeesGrupo">
                                                                <div>
                                                                    <h5 class="descriptionpartidos">Partidos 2022-2023</h5>
                                                                </div>
                                                            </div>
                                                            <div class="dattosgrupos show">
                                                                <div class="datosgruopdago">
                                                                    <div class="estadisticasht">
                                                                        <div class="estadisticasbtn">
                                                                            <div class="estadisticasfinaluy">
                                                                                <div class="estadostrfd">
                                                                                    <i class=" estadisttticas font-ligadago "><img
                                                                                            src="{{asset('assets/img/campofutbol.png') }}"
                                                                                            class="iconcancha"></i>
                                                                                </div>
                                                                                <div class="estadisticaaaser">
                                                                                    <div class="titlepartidosjugadooos">
                                                                                        <p class="partijugados partidoosju">
                                                                                            Partidos Jugados

                                                                                        </p>
                                                                                        <p class="partijugadosgfd partidoosju">

                                                                                            {{ $partidosJugados }}

                                                                                        </p>
                                                                                    </div>

                                                                                </div>

                                                                            </div>

                                                                            <div class="estadisticasfinalfsd">
                                                                                <div class="partidosspendientes">
                                                                                    <div class="datospartidospendientes">
                                                                                        <p class="titlependientes pendienteeees">
                                                                                            Pendientes
                                                                                        </p>
                                                                                        <p class="partidospendienteess pendienteeees">
                                                                                            {{ $partidosPendientes }}

                                                                                        </p>

                                                                                    </div>

                                                                                </div>

                                                                            </div>

                                                                        </div>


                                                                        <div class="estadisticasbtn">
                                                                            <div class=contenedorvictorias>
                                                                                <div class="cont1">
                                                                                    <i class=" estadisticasgold font-ligadago ">
                                                                                        <img src="{{asset('assets/img/trofeo.png') }}" class="iconcancha">
                                                                                    </i>
                                                                                </div>
                                                                                <div class="cont2">
                                                                                    <div class="margenvictorias">
                                                                                        <p class="textmarcadores marcatotal">Victorias</p>
                                                                                        <p class="nummarcadores marcatotal">{{ $team_points!=null?$team_points->matches_won:0 }}</p>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="cont2">
                                                                                </div>
                                                                            </div>

                                                                            <div class=contenedorempates>
                                                                                <div class="iconmarcadoresempate">
                                                                                    <i class=" estadisticasgold font-ligadago "><img
                                                                                            src="{{asset('assets/img/puntaje.png') }}"
                                                                                            class="iconcancha"></i>
                                                                                </div>
                                                                                <div class="textmarcadorempate">
                                                                                    <div class="contenmarcadorempate">
                                                                                        <p class="marcatotal textoempatees">Empatados</p>
                                                                                        <p class="marcatotal numeroempates">{{ $team_points!=null?$team_points->tied_matches:0 }}</p>
                                                                                    </div>
                                                                                </div>
                                                                                <div></div>
                                                                            </div>
                                                                        </div>
                                                                        <div class=contenedorderrotas>
                                                                            <div class="iconmarcadoresempate">
                                                                                <i class=" estadisticasgold font-ligadago "><img
                                                                                        src="{{asset('assets/img/objetivo.png') }}"
                                                                                        class="iconcancha"></i>
                                                                            </div>

                                                                            <div class="textmarcadorempate">
                                                                                <div class="contenmarcadorempate">
                                                                                    <p class="marcatotal textoderrotas">
                                                                                        Derrotas

                                                                                    </p>

                                                                                        <p class="marcatotal numeroderrotas">

                                                                                            {{ $team_points!=null?$team_points->matches_lost:0 }}
                                                                                        </p>


                                                                                </div>

                                                                            </div>

                                                                            <div>

                                                                            </div>

                                                                        </div>

                                                                        <div class="estadisticasbtnbbg">
                                                                            <div class="informacionpartidosdatos">
                                                                                <div class="iconinformacionpartidos">
                                                                                    <i class="font-ligadago iconpartidosclub">
                                                                                        <img
                                                                                            src="{{asset('assets/img/gool.png') }}"
                                                                                            class="iconcancha">
                                                                                    </i>

                                                                                </div>
                                                                                <div class="textinformacionpartidos">
                                                                                    <div class="conteinfopartidos">

                                                                                            <p class="marcatotal infogoles">
                                                                                                {{ $team_points!=null?$team_points->goals_scored:0 }}
                                                                                            </p>




                                                                                        <p class="marcatotal totalgoooles">
                                                                                            Goles

                                                                                        </p>

                                                                                    </div>

                                                                                </div>

                                                                            </div>

                                                                            <div class="informacionpartidosdatos">
                                                                                <div class="iconinformacionpartidos">
                                                                                    <i class="font-ligadago iconpartidosclub">
                                                                                        <img
                                                                                            src="{{asset('assets/img/tarjetamarilla.png') }}"
                                                                                            class="iconcancha">
                                                                                    </i>

                                                                                </div>
                                                                                <div class="textinformacionpartidos">
                                                                                    <div class="conteinfopartidos">
                                                                                        <p class="marcatotal infogoles">

                                                                                            {{ $sumaAmarillas}}

                                                                                        </p>
                                                                                        <p class="marcatotal totalasistenciaas">
                                                                                           Amarillas

                                                                                        </p>

                                                                                    </div>

                                                                                </div>

                                                                            </div>

                                                                            <div class="informacionpartidosdatos">

                                                                                <div class="iconinformacionpartidos">
                                                                                    <i class="font-ligadago iconpartidosclub">
                                                                                        <img
                                                                                            src="{{asset('assets/img/tarjetaroja.png') }}"
                                                                                            class="iconcancha">
                                                                                    </i>

                                                                                </div>

                                                                                <div class="textinformacionpartidos">
                                                                                    <div class="conteinfopartidos">
                                                                                        <p class="marcatotal infogoles">
                                                                                            {{ $sumaRojas}}
                                                                                        </p>
                                                                                        <p class="marcatotal totalgoooles">
                                                                                            Rojas

                                                                                        </p>

                                                                                    </div>

                                                                                </div>

                                                                            </div>

                                                                            <div class="informacionpartidosdatosgg">

                                                                                <div class="iconinformacionpartidos">
                                                                                    <i class="font-ligadago iconpartidosclub">
                                                                                        <img
                                                                                            src="{{asset('assets/img/silbar.png') }}"
                                                                                            class="iconcancha">
                                                                                    </i>

                                                                                </div>

                                                                                <div class="textinformacionpartidos">
                                                                                    <div class="conteinfopartidos">

                                                                                            <p class="marcatotal infogoles">

                                                                                                {{ $team_points!=null?$team_points->goals_against:0 }}
                                                                                            </p>


                                                                                        <p class="marcatotal totalgoooles">
                                                                                            Goles en contra

                                                                                        </p>

                                                                                    </div>

                                                                                </div>

                                                                            </div>

                                                                        </div>

                                                                    </div>

                                                                </div>

                                                                <div class="datosgruopdagofg"></div>
                                                                <div class="datosgruopdagofg"></div>

                                                            </div>

                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>


                                    <script src="https://code.highcharts.com/highcharts.js"></script>
                                    <script src="https://code.highcharts.com/modules/exporting.js"></script>


{{--                                    <figure class="highcharts-figure">--}}
{{--                                        <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>--}}
{{--                                        <p class="highcharts-description">--}}
{{--                                            Chart showing use of rotated axis labels and data labels. This can be a--}}
{{--                                            way to include more labels in the chart, but note that more labels can--}}
{{--                                            sometimes make charts harder to read.--}}
{{--                                        </p>--}}
{{--                                    </figure>--}}


                                </div>
                            </div>

                        </div>


                    </div>

                </div>
            </div>
        </div>
    </div>


@endsection
