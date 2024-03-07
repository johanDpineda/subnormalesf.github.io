
<div class="modal fade animate__animated fadeIn" id="modalArbitro{{$arbitro->id}}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content modal-contentpefil">
        <div class="modal-header" style="text-align: center;">
          <h4 class="modal-title" id="exampleModalLabel5" style="margin: auto; ;color: #d3fe00;">Detalles del Arbitro</h4>
          <div style="position: absolute;bottom: 0;left: 50%;transform: translateX(-50%);width: 100%;height: 2px;background-color: #6a7f00;"></div>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">

                <div class="player-info row align-items-center">

                    @php
                        $nombres = explode(' ', $partido->arbitrator->name);
                        $primerNombre = $nombres[0];
                        $apellidos= explode(' ', $partido->arbitrator->lastname);
                        $primerapellido = $apellidos[0];
                    @endphp

                    <div class="col-6">
                        @if($partido->arbitrator->image!=null)

                            <div class="player-photo">
                                <img src="{{asset('uploads/arbitrators/'.$partido->arbitrator->image) }}"
                                     class="styled__ImageStyled-sc-17v9b6o-0 ">
                            </div>
                        @else
                            <div class="player-photo">
                                <img src="{{asset('assets/img/favicon/favicon.png') }}"
                                     class="styled__ImageStyled-sc-17v9b6o-0 " style="width: 100% !important;min-height: 50% !important;">
                            </div>
                        @endif
                    </div>
                    <div class="col-6">
                        <div class="player-details w-100">
                            <div class="details-row">
                                <div class="details-cell">
                                    <p style="color: #d3fe00;"><span class="letramodaljugador">Nombre:</span> <span class="info-player" style="text-transform: uppercase;">{{ $primerNombre}}</span> </p>
                                </div>
                                <div class="details-cell">
                                    <p style="color: #d3fe00;"><span class="letramodaljugador">Apellido:</span> <span class="info-player" style="text-transform: uppercase;">{{ $primerapellido }}</span> </p>
                                </div>
                            </div>

                            <div class="details-row">

                                @php
                                    $anioActual = date('Y');
                                    $anioNacimiento = date('Y', strtotime($arbitro->birth_date));
                                    $edad = $anioActual - $anioNacimiento;

                                    if (date('md', strtotime($arbitro->birth_date)) > date('md')) {
                                        $edad--; // Ajustar la edad si aún no ha cumplido años este año
                                    }
                                @endphp

                                <div class="details-cell">
                                    <p style="color: #d3fe00;"><span class="letramodaljugador">Edad:</span> <span class="info-player" style="text-transform: uppercase;">{{$edad}}</span> </p>
                                </div>


                                <div class="details-cell">
                                    <p style="color: #d3fe00; text-align: end;"><span class="letramodaljugador">Asociación:</span> <span class="info-player text-end" style="text-transform: uppercase;">{{ $arbitro->Association}}</span> </p>
                                </div>
                            </div>
                        </div>
                    </div>



                </div>

                <div class="stats-title" >
                    <h4 style="color: #d3fe00; margin-bottom: 0px;">Próximos Partidos</h4>
                    <div style="position: relative;bottom: 0;left: 50%;transform: translateX(-50%);width: 100%;height: 2px;background-color: #6a7f00;"></div>
                </div>

                <div class="player-stats">

                    <div class="stats-containerdsd">
                        <div class="statperfilarbitro">

                            <section  class="table  table_bodyperfilarbitro">
                                <table class="partidosarbitros table_bodyarbitro table-striped table-hover" style="padding: 0px;">

                                    @php
                                        $imagenes = \Illuminate\Support\Facades\File::allFiles(public_path('uploads/logoteamscolor/'));
                                        $imagenAleatoria = collect($imagenes)->random();
                                    @endphp

                                    <tbody class="custom-tbody">

                                        @foreach($ultimosPartidos as $ultimosPartido)

                                                <tr class="descripcionarbitro">

                                                        <td class="custom-td" style="width: 100%;">
                                                            <div class="partidosoficiales">
                                                                <div class="clubespartidos">
                                                                    <a href="">
                                                                        <div class="cluboficiales">
                                                                            @if($ultimosPartido->team_one->logo!=null)

                                                                                <img
                                                                                    src="{{asset('uploads/teams/'.$ultimosPartido->team_one->logo) }}"
                                                                                    class="iconclubesliga size-xs">
                                                                                <div class="textoequipo1" style="margin-top: 0px !important;">
                                                                                    <p class="nameclubarbitro">{{ Str::limit($ultimosPartido->team_one->name, 13) }}</p>
                                                                                </div>

                                                                            @else
                                                                                @if ($imagenAleatoria)
                                                                                    <img src="{{ asset('uploads/logoteamscolor/' . $imagenAleatoria->getFilename()) }}" alt="Descripción de la imagen" class="iconclubesliga size-xs">
                                                                                    <div class="textoequipo1" style="margin-top: 0px !important;">
                                                                                        <p class="nameclubarbitro">{{ Str::limit($ultimosPartido->team_one->name, 13) }}</p>
                                                                                    </div>
                                                                                @else
                                                                                    <img class="badge-image badge-image--80 js-badge-image" src="{{asset('assets/img/favicon/favicon.png') }}">
                                                                                    <div class="textoequipo1" style="margin-top: 0px !important;">
                                                                                        <p class="nameclubarbitro">{{ Str::limit($ultimosPartido->team_one->name, 13) }}</p>
                                                                                    </div>
                                                                                @endif

                                                                                {{--  <img
                                                                                    src="{{asset('assets/img/favicon/favicon.png') }}"
                                                                                    class="iconclubesliga size-xs">
                                                                                <div class="textoequipo1" style="margin-top: 0px !important;">
                                                                                    <p class="nameclubarbitro">{{$ultimosPartido->team_one->name}}</p>
                                                                                </div>  --}}

                                                                            @endif


                                                                        </div>
                                                                    </a>
                                                                </div>

                                                                <div class="clubespartidosgf">

                                                                    <div class="live">



                                                                        @if($ultimosPartido->results!=null)
                                                                            @if($ultimosPartido->results->team_one_score!=null)

                                                                                <p class="marcadoresarbitro">{{$ultimosPartido->results->team_one_score}}</p>
                                                                                <p class="marcadoresarbitro">-</p>
                                                                                <p class="marcadoresarbitro">{{$ultimosPartido->results->team_two_score}}</p>

                                                                            @else
                                                                                <p class="marcadoresarbitro">Vs</p>
                                                                            @endif

                                                                        @else

                                                                            <p class="marcadoresarbitro">Vs</p>
                                                                        @endif


                                                                    </div>
                                                                </div>

                                                                <div class="clubespartidos">
                                                                    <a href="">
                                                                        <div class="cluboficialesop2">

                                                                            @if($ultimosPartido->team_two->logo!=null)

                                                                                <img
                                                                                    src="{{asset('uploads/teams/'.$ultimosPartido->team_two->logo) }}"
                                                                                    class="iconclubesliga size-xs">
                                                                                <div class="textoequipo2" style="margin-top: 0px !important;">
                                                                                    <p class="nameclubarbitro">{{ Str::limit($ultimosPartido->team_two->name, 13) }} </p>
                                                                                </div>

                                                                            @else

                                                                                @if ($imagenAleatoria)
                                                                                    <img src="{{ asset('uploads/logoteamscolor/' . $imagenAleatoria->getFilename()) }}" alt="Descripción de la imagen" class="iconclubesliga size-xs">
                                                                                    <div class="textoequipo2" style="margin-top: 0px !important;">
                                                                                        <p class="nameclubarbitro">{{ Str::limit($ultimosPartido->team_two->name, 13) }}</p>
                                                                                    </div>
                                                                                @else
                                                                                    <img class="badge-image badge-image--80 js-badge-image" src="{{asset('assets/img/favicon/favicon.png') }}">
                                                                                    <div class="textoequipo2" style="margin-top: 0px !important;">
                                                                                        <p class="nameclubarbitro">{{ Str::limit($ultimosPartido->team_two->name, 13) }}</p>
                                                                                    </div>
                                                                                @endif

                                                                                {{--  <img
                                                                                    src="{{asset('assets/img/favicon/favicon.png') }}"
                                                                                    class="iconclubesliga size-xs">
                                                                                <div class="textoequipo2" style="margin-top: 0px !important;">
                                                                                    <p class="nameclubarbitro">{{$ultimosPartido->team_two->name}}</p>
                                                                                </div>  --}}

                                                                            @endif


                                                                        </div>
                                                                    </a>
                                                                </div>

                                                            </div>
                                                            <div style="margin-top: 10px">
                                                                <span style="color: #dad7d7">Fecha: <span style="color: #c4c0c0"> {{ $ultimosPartido->date }} </span> </span>
                                                            </div>
                                                        </td>

                                                </tr>

                                        @endforeach





                                    </tbody>

                                </table>
                            </section>





                        </div>

                        <div class="contenedor-horizontal">
                            <div class="elemento" style="margin-top: 6px;flex: 1;display: flex;justify-content: center;align-items: center;">
                                <button type="button" class="btn btn-primary infopartidoverMovil" data-bs-toggle="modal" data-bs-target="#modalArbitromatch{{ $arbitro->id }}" style="height: 42px;width: 40%;">
                                   <span style="margin-right: 5px;">Detalles</span> <i class="fa-sharp fa-solid fa-list-ul fa-lg" style="color: #080808;"></i></i>
                                </button>
                            </div>

                        </div>




                    </div>

                </div>
        </div>




      </div>
    </div>
</div>

@include('frontend.modalultimospartidosarbitro.index')
