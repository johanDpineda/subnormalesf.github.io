<div class="modal fade animate__animated fadeIn" id="animationModal{{ $player->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header" style="text-align: center;">
          <h4 class="modal-title" id="exampleModalLabel5" style="margin: auto; ;color: #d3fe00;">Detalles del Jugador</h4>
          <div style="position: absolute;bottom: 0;left: 50%;transform: translateX(-50%);width: 100%;height: 2px;background-color: #6a7f00;"></div>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">

                <div class="player-info row align-items-center">
                    <div class="col-md-6">
                        @if($player->profile_photo!=null)

                            <div class="player-photo">
                                <img src="{{asset('uploads/players/'.$player->profile_photo) }}"
                                     class="styled__ImageStyled-sc-17v9b6o-0 ">
                            </div>
                        @else
                            <div class="player-photo">
                                <img src="{{asset('assets/img/favicon/jugador-de-futbol2.png') }}"
                                     class="styled__ImageStyled-sc-17v9b6o-0 ">
                            </div>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <div class="player-details w-100">
                            <div class="details-row">
                                <div class="details-cell">
                                    <p style="color: #d3fe00;"><span class="letramodaljugador">Nombre:</span> <span class="info-player">{{ $primerNombre}}</span> </p>
                                </div>
                                <div class="details-cell">
                                    <p style="color: #d3fe00;"><span class="letramodaljugador">Apellido:</span> <span class="info-player"></span> {{ $primerapellido }}</p>
                                </div>
                            </div>
                            <div class="details-row">
                                <div class="details-cell">
                                    <p style="color: #d3fe00;"><span class="letramodaljugador">Posición:</span> <span class="info-player">{{ $player->position->name }}</span> </p>
                                </div>
                                <div class="details-cell">
                                    <p style="color: #d3fe00;"><span class="letramodaljugador">Altura:</span> <span class="info-player">{{ $player->height }} cm</span> </p>
                                </div>
                            </div>
                            <div class="details-row">
                                <div class="details-cell">
                                    <p style="color: #d3fe00;"><span class="letramodaljugador">Peso:</span> <span class="info-player">{{ $player->weight }} kg</span> </p>
                                </div>
                                @php
                                    $anioActual = date('Y');
                                    $anioNacimiento = date('Y', strtotime($player->birth_date));
                                    $edad = $anioActual - $anioNacimiento;

                                    if (date('md', strtotime($player->birth_date)) > date('md')) {
                                        $edad--; // Ajustar la edad si aún no ha cumplido años este año
                                    }
                                @endphp

                                <div class="details-cell">
                                    <p style="color: #d3fe00;"><span class="letramodaljugador">
{{--                                        F Nacim./--}}
                                        Edad:</span>
                                        {{--                                    {{ $player->birth_date }}--}}
                                        <span class="info-player">{{ $edad }} Años</span>

                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>



                </div>

                <div class="stats-title" >
                    <h4 style="color: #d3fe00; margin-bottom: 0px;">Estadísticas</h4>
                    <div style="position: relative;bottom: 0;left: 50%;transform: translateX(-50%);width: 100%;height: 2px;background-color: #6a7f00;"></div>
                </div>

                <div class="player-stats">

                    <div class="stats-containerstatics">
                        <div class="statperfilmodalplayer">
                            <img src="{{asset('assets/img/balonf.webp') }}" class="imagenmodalperfilplayer">
                            <div class="contendordatosstatics">

                                 {{--  {{ $player->scorerMatches->whereNotNull('goals')->sum('goals') }}  --}}

                                 {{$player->scorerMatches->where('tournament_id', $tournament->id)->whereNotNull('goals')->sum('goals')}}







                            </div>
                            <div class="titulodatosstactics">
                                Goles
                            </div>

                                {{--  <p class="titlemodal" style="color: #d3fe00;"><span class="letramodaljugador">Goles: </span> </p>  --}}

                        </div>
                        <div class="statperfilmodalplayer">
                            <img src="{{asset('assets/img/tarjetaverde.svg') }}" class="imagenmodalperfilplayer" >
                            <div class="contendordatosstatics">
                                {{--  {{ $player->scorerMatches->whereNotNull('yellow')->sum('yellow') }}  --}}
                                {{$player->scorerMatches->where('tournament_id', $tournament->id)->whereNotNull('yellow')->sum('yellow')}}
                            </div>
                            <div class="titulodatosstactics">
                                Amarillas
                            </div>



                        </div>
                        <div class="statperfilmodalplayer">
                            <img src="{{asset('assets/img/tarjetaroja.svg') }}" class="imagenmodalperfilplayer">
                            <div class="contendordatosstatics">
                                {{--  {{ $player->scorerMatches->whereNotNull('red')->sum('red') }}  --}}
                                {{$player->scorerMatches->where('tournament_id', $tournament->id)->whereNotNull('red')->sum('red')}}
                            </div>
                            <div class="titulodatosstactics">
                                Rojas
                            </div>
                        </div>
                    </div>
                </div>
        </div>




      </div>
    </div>
</div>

