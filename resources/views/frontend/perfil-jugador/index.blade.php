@extends('frontend.layouts.app')
@section('title',__('Perfil Jugador'))
@section('content')

    @include('frontend.layouts.partials.sponsors')

    <div class="background-league">
        <div class="container">
            <div class="inner-div">

                <div class="three-columns">

                    <div class="col-6 perfiljugadormovil">

                        @if($player->profile_photo!=null)
                            <div class="nested-div">
                                <img src="{{asset('uploads/players/'.$player->profile_photo) }}"
                                    class="styled__ImageStyled-sc-17v9b6o-0 coeclD">
                            </div>
                        @else
                            <div class="nested-div">
                                <img src="{{asset('assets/img/favicon/favicon.png') }}"
                                    class="styled__ImageStyled-sc-17v9b6o-0 coeclD">
                            </div>
                        @endif



                    </div>

                    <div class="col-6 perfiljugadormovil">


                        <div class="split-horizontal">

                            <div class="upper-section">

                                @if($team->logo!=null)

                                    <div class="image-div">
                                        <img src="{{asset('uploads/teams/'.$team->logo) }}" alt="pl" title="pl" class="imagenperfilequipo" >
                                    </div>
                                @else
                                    <div class="image-div">
                                        <img src="{{asset('assets/img/favicon/favicon.png') }}" alt="pl" title="pl"  class="imagenperfilequipo" >
                                    </div>
                                @endif

                                <div class="text-div">
                                    <div class="text-div">
                                        <p class="nameteamsplayer"> {{$team_scorer->game_team->name}}</p>
                                    </div>

                                    <div class="text-div">
                                        <p class="numberplayer">{{ $player->player_number }}</p>
                                    </div>
                                </div>

                            </div>


                        </div>



                    </div>

                </div>

                <div class="lower-section">
                    <div class="inner-lower">
                        <div class="left-div">

                            <section class="player-overview__side-widget">
                                <h3 class="player-overview__sub-header">
                                    Información del jugador
                                    <div class="lineatitulo"></div>
                                </h3>

                                <div data-script="pl_player" data-widget="player-overview-stats" data-player="9662">

                                    <div class="player-overview__col">
                                        <div class="player-overview__label" style="color: white;">
                                            Nombre
                                        </div>

                                        <div class="player-overview__info">
                                            {{$player->player_name}}
                                        </div>
                                    </div>

                                    <div class="player-overview__col">
                                        <div class="player-overview__label" style="color: white;">
                                            Lugar de nacimiento
                                        </div>
                                        <div class="player-overview__info">
                                            {{ $player->city->name }}
                                        </div>
                                    </div>

                                    <div class="player-overview__col">
                                        <div class="player-overview__label" style="color: white;">
                                            Posición
                                        </div>
                                        <div class="player-overview__info">
                                            {{ $player->position->name }}
                                        </div>
                                    </div>

                                    <div class="player-overview__col">
                                        <div class="player-overview__label" style="color: white;">
                                            Altura
                                        </div>
                                        <div class="player-overview__info">
                                            {{ $player->weight }} cm
                                        </div>
                                    </div>

                                    <div class="player-overview__col">
                                        <div class="player-overview__label" style="color: white;">
                                            Peso
                                        </div>
                                        <div class="player-overview__info">
                                            {{ $player->weight }} kg
                                        </div>
                                    </div>
                                </div>

                            </section>

                        </div>

                        <div class="right-div">


                            <section class="player-overview__side-widget" style="width: 100%;">
                                <h3 class="player-overview__sub-header">
                                    Estadísticas del jugador
                                    <div class="lineatitulo"></div>
                                </h3>
                                <div data-script="pl_player" data-widget="player-overview-stats" data-player="9662">

                                    <div class="player-overview__colestadisticas">

                                        <div class="player-overview__label tamanomovil" style="color: white;">
                                            <img src="{{asset('assets/img/balonf.webp') }}" class="imagenperfil">
                                            Goles
                                        </div>

                                        <div class="player-overview__info">
                                            {{ $team_scorer!=null?$team_scorer->goals:0 }}
                                        </div>
                                    </div>

                                    <div class="player-overview__colestadisticas">

                                        <div class="player-overview__label tamanomovil" style="color: white;">
                                            <img src="{{asset('assets/img/tarjetaverde.svg') }}" class="imagenperfil" >
                                            Amarillas
                                        </div>
                                        <div class="player-overview__info">
                                            {{$team_card!=null?$team_card->Yellow:0}}
                                        </div>
                                    </div>

                                    <div class="player-overview__colestadisticas">

                                        <div class="player-overview__label tamanomovil" style="color: white;">
                                            <img src="{{asset('assets/img/tarjetaroja.svg') }}" class="imagenperfil">
                                            Rojas
                                        </div>
                                        <div class="player-overview__info">
                                            {{$team_card!=null?$team_card->Red:0}}
                                        </div>
                                    </div>



                                </div>

                            </section>










                        </div>

                    </div>

                </div>

            </div>



        </div>
    </div>








@endsection
