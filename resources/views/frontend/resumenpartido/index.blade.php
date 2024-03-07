@extends('frontend.layouts.app')
@section('title',__('Resultados'))
@section('content')

    <!-- Pantalla de carga -->


    @include('frontend.layouts.partials.bannermifutbol')
    @include('frontend.layouts.partials.sponsors')

    <div class="background-league">
        <div class="content">
            <div id="full-width-div">
                <a href="{{ route('resultados.view', ['league_slug' => $leagueSlug, 'tournament_slug' => $defaultTournament]) }}">
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
                        <div class="mc-summary__info-container">

                            <div class="mc-summary__info">
                                <span class="textomodocelresumen">Fecha </span> <span>{{ $partido->date }}</span>
                            </div>

                            <div class="vertical-line"></div>


                            <div class="mc-summary__info">
                                <p class="neutral" type="button" data-bs-toggle="modal" data-bs-target="#modalCancha{{$cancha->id}}" data-backdrop="static"><span class="textomodocelresumen">Cancha </span><span>{{$partido->canchasjuego->name}}</span></p>
                            </div>

                            <div class="vertical-line"></div>


                                <div class="mc-summary__info">
                                    <p class="neutral" type="button" data-bs-toggle="modal" data-bs-target="#modalArbitro{{$arbitro->id}}"><span class="textomodocelresumen">Arbitro </span> <span>{{$partido->arbitrator->name}} {{$partido->arbitrator->lastname}}</span></p>
                                </div>


                        </div>

                        <div class="mc-summary__scorebox-container">
                            <div class="mc-summary__teams-container">

                                <div class="mc-summary__team-container">

                                    <div class="mc-summary__team home t8">
                                        <a href="" class="mc-summary__badge-container" type="button" data-bs-toggle="modal" data-bs-target="#modalvistarapido{{$partido->id}}" >
                                            @if($partido->team_one->logo!=null  )
                                                <span class="badge badge-image-container" data-widget="club-badge-image" data-size="80">
                                                    <img class="badge-image badge-image--80 js-badge-image" src="{{asset('uploads/teams/'.$partido->team_one->logo) }}">
                                                </span>
                                            @else

                                                <span class="badge badge-image-container" data-widget="club-badge-image"data-size="80">
                                                    <img class="badge-image badge-image--80 js-badge-image"
                                                    src="{{asset('assets/img/favicon/favicon.png') }}">
                                                </span>
                                            @endif
                                        </a>

                                        <a href="" class="mc-summary__team-name-link t8" type="button" data-bs-toggle="modal" data-bs-target="#modalvistarapido{{$partido->id}}" >
                                            <span class="mc-summary__team-name u-hide-phablet">
                                                <font style="vertical-align: inherit;">
                                                    <font style="vertical-align: inherit;">
                                                        {{$partido->team_one->name}}
                                                    </font>
                                                </font>
                                            </span>
                                            <span class="mc-summary__team-name u-show-phablet"> {{ substr($partido->team_one->name, 0, 3) }}</span>
                                        </a>

                                    </div>

                                    @foreach ( $partido->statistics as $partidos )
                                        @if($partido->game_team_one_id == $partidos->game_team_id )

                                            <div class="matchEvents matchEventsContainer home">

                                                <div class="mc-summary__event">

                                            <span class="mc-summary__event-time">
                                                <img src="{{asset('assets/img/web/balongol.webp') }}"
                                                     class="mc-summary__event-time-icon" style="
                                                width: 27px;
                                                height: 26px;">
                                                <font style="vertical-align: inherit;">
                                                    <font style="vertical-align: inherit;">
                                                        {{$partidos->minut}}

                                                    </font>
                                                </font>
                                            </span>

                                                    <div class="mc-summary__player-names-container">
                                                        <a href="" class="mc-summary__scorer">
                                                            <div class="mc-summary__scorer-name-first">
                                                                <font style="vertical-align: inherit;">
                                                                    <font style="vertical-align: inherit;">
                                                                      {{$partidos->player}}
                                                                    </font>
                                                                </font>
                                                            </div>

                                                        </a>

                                                    </div>

                                                </div>


                                            </div>
                                        @endif
                                    @endforeach



                                    @foreach ( $partido->statistics as $partidos )
                                        @if($partido->game_team_one_id == $partidos->game_team_id_2 )

                                            <div class="matchEvents matchEventsContainer home">

                                                <div class="mc-summary__event">

                                        <span class="mc-summary__event-time">
                                            @if($partidos->card_id === 1)
                                                <img src="{{asset('assets/img/tarjetaverde.svg') }}" alt="Imagen Amarilla" class="mc-summary__event-time-icon" style="
                                                width: 27px;
                                                height: 26px;">
                                            @elseif($partidos->card_id === 2)
                                                <img src="{{asset('assets/img/tarjetaroja.svg') }}" alt="Imagen Roja" class="mc-summary__event-time-icon" style="
                                                width: 27px;
                                                height: 26px;">
                                            @endif


                                            <font style="vertical-align: inherit;">

                                                <font style="vertical-align: inherit;">
                                                    {{$partidos->minut_2}}

                                                </font>
                                            </font>
                                        </span>

                                                    <div class="mc-summary__player-names-container">
                                                        <a href="" class="mc-summary__scorer">
                                                            <div class="mc-summary__scorer-name-first">
                                                                <font style="vertical-align: inherit;">
                                                                    <font style="vertical-align: inherit;">
                                                                        {{$partidos->player_2}}

                                                                    </font>
                                                                </font>
                                                            </div>

                                                        </a>

                                                    </div>

                                                </div>


                                            </div>
                                        @endif
                                    @endforeach


                                </div>

                                <div class="mc-summary__score-container complete">
                                    <div class="mc-summary__score js-mc-score"><font style="vertical-align: inherit;"><font
                                                style="vertical-align: inherit;">{{$partido->results->team_one_score}}</font></font><span><font
                                                style="vertical-align: inherit;"><font
                                                    style="vertical-align: inherit;">-</font></font></span><font
                                            style="vertical-align: inherit;"><font
                                                style="vertical-align: inherit;">{{$partido->results->team_two_score}}</font></font>
                                    </div>

                                </div>

                                <div class="mc-summary__team-container">
                                    <div class="mc-summary__team away t36">

                                        <a href="" class="mc-summary__badge-container"  data-bs-toggle="modal" data-bs-target="#modalvistarapidoequipo2{{$partido->id}}">

                                            @if($partido->team_two->logo!=null  )
                                                <span class="badge badge-image-container" data-widget="club-badge-image"
                                                      data-size="80">
                                        <img class="badge-image badge-image--80 js-badge-image"
                                             src="{{asset('uploads/teams/'.$partido->team_two->logo) }}">
                                    </span>

                                            @else

                                                <span class="badge badge-image-container" data-widget="club-badge-image"
                                                      data-size="80">
                                        <img class="badge-image badge-image--80 js-badge-image"
                                             src="{{asset('assets/img/favicon/favicon.png') }}">
                                    </span>

                                            @endif


                                        </a>

                                        <a href="" class="mc-summary__team-name-link t8"  data-bs-toggle="modal" data-bs-target="#modalvistarapidoequipo2{{$partido->id}}" >
                                            <span class="mc-summary__team-name u-hide-phablet"><font
                                            style="vertical-align: inherit;"><font
                                            style="vertical-align: inherit;"> {{$partido->team_two->name}}</font></font></span>
                                            <span class="mc-summary__team-name u-show-phablet">{{ substr($partido->team_two->name, 0, 3) }}</span>
                                        </a>


                                    </div>

                                    @foreach ( $partido->statistics as $partidos )
                                        @if($partido->game_team_two_id == $partidos->game_team_id)

                                            <div class="matchEvents matchEventsContainer away">
                                                <div class="mc-summary__event">
                                        <span class="mc-summary__event-time">
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;">
                                                    {{$partidos->minut}}

                                                </font>
                                            </font>
                                            <img src="{{asset('assets/img/web/balongol.webp') }}"
                                                 class="mc-summary__event-time-icon" style="
                                            width: 27px;
                                            height: 26px;">

                                        </span>

                                                    <div class="mc-summary__player-names-container">
                                                        <a href="" class="mc-summary__scorer">

                                                            <div class="mc-summary__scorer-name-first">
                                                                <font style="vertical-align: inherit;">
                                                                    <font style="vertical-align: inherit;">

                                                                        {{$partidos->player}}

                                                                    </font>
                                                                </font>
                                                            </div>

                                                        </a>

                                                    </div>

                                                </div>


                                            </div>
                                        @endif
                                    @endforeach

                                    @foreach ( $partido->statistics as $partidos )
                                        @if($partido->game_team_two_id == $partidos->game_team_id_2 )

                                            <div class="matchEvents matchEventsContainer away">
                                                <div class="mc-summary__event">
                                    <span class="mc-summary__event-time">
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">
                                                {{$partidos->minut_2}}

                                            </font>
                                        </font>
                                        @if($partidos->card_id === 1)
                                            <img src="{{asset('assets/img/tarjetaverde.svg') }}" alt="Imagen Amarilla" class="mc-summary__event-time-icon" style="
                                            width: 27px;
                                            height: 26px;">
                                        @elseif($partidos->card_id === 2)
                                            <img src="{{asset('assets/img/tarjetaroja.svg') }}" alt="Imagen Roja" class="mc-summary__event-time-icon" style="
                                            width: 27px;
                                            height: 26px;">
                                        @endif


                                    </span>

                                                    <div class="mc-summary__player-names-container">
                                                        <a href="" class="mc-summary__scorer">

                                                            <div class="mc-summary__scorer-name-first">
                                                                <font style="vertical-align: inherit;">
                                                                    <font style="vertical-align: inherit;">
                                                                        {{$partidos->player_2}}

                                                                    </font>
                                                                </font>
                                                            </div>

                                                        </a>

                                                    </div>

                                                </div>


                                            </div>


                                        @endif
                                    @endforeach

                                </div>

                            </div>

                        </div>

                    </div>


                </section>
            </div>
        </div>
    </div>


@endsection

