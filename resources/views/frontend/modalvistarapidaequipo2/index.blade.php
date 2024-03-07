<div class="modal fade animate__animated fadeIn" id="modalvistarapidoequipo2{{ $partido->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content" style="width: 100%;padding: 20px 0px;">
        <div class="modal-header" style="text-align: center;">
          <h4 class="modal-title" id="exampleModalLabel5" style="margin: auto; ;color: #d3fe00;">Detalles del Equipo</h4>
          <div style="position: absolute;bottom: 0;left: 50%;transform: translateX(-50%);width: 100%;height: 2px;background-color: #6a7f00;"></div>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body" style="padding: 0px;">

            <div class="containerinforapida">
                <div class="left">

                    <table class="partidosclubes table_body table-striped table-hover" id="tabla-informacion" style="padding: 10px;">
                        <thead>
                            <tr class="barraopcionespartidos">
                            <th class="descriptablapartidos">

                                <span class="label">FECHA</span>
                            </th>

                            <th class="descriptablapartidos">

                                <span class="label">HORARIO</span>
                            </th>

                            <th class="descriptablapartidos">

                                <span class="label">PARTIDO</span>
                            </th>

                        </tr>
                        </thead>
                        <tbody style="border-color: #676767;border-width: 1px;">
                        @forelse($ultimosPartidosclub2 as $match)
                            <tr class="descripcionesspartido" data-id="{{$match->session->name}}">
                                <td class="descrip1 tablepartidoo">
                                    <p class="fechapartido">{{ $match->date }}</p>
                                </td>

                                <td class="descrip2 tablepartidoo1">
                                    <p class="horapartido">{{ $match->hour }}</p>
                                </td>

                                <td class="descrip3 tablepartidoo2">
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
                                                                <p class="nameclub"> {{ Str::limit($match->team_one->name, 15) }}</p>
                                                            </div>
                                                        @else
                                                            <img src="{{asset('assets/img/favicon/favicon.png') }}" class="iconclubesliga size-xs">
                                                            <div class="textoequipo1">
                                                                <p class="nameclub">{{ Str::limit($match->team_one->name, 15) }}</p>
                                                            </div>
                                                        @endif
                                                        {{--
                                                        <img
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
                                                            $imagenAleatoriamodalvista2 = collect($imagenes)->random();
                                                        @endphp

                                                        @if ($imagenAleatoriamodalvista2)
                                                            <img src="{{ asset('uploads/logoteams/' . $imagenAleatoriamodalvista2->getFilename()) }}" alt="Descripción de la imagen" class="iconclubesliga size-xs">
                                                            <div class="textoequipo2">
                                                                <p class="nameclub"> {{ Str::limit($match->team_two->name, 15) }}</p>
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
                                </td>

                            </tr>
                        @empty
                            <tr class="odd">
                                <td valign="top" colspan="12" class="dataTables_empty text-center">No hay partidos</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>


                    @forelse($ultimosPartidosclub2 as $match )

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
                                                        <p class="nameclubmovil">{{$match->team_one->name}}</p>
                                                    </div>

                                                @else

                                                    @if ($imagenAleatoria)
                                                        <img src="{{ asset('uploads/logoteams/' . $imagenAleatoria->getFilename()) }}" alt="Descripción de la imagen" class="iconclubesligamovil size-xs">
                                                        <div class="textoequipo1movil">
                                                            <p class="nameclubmovil"> {{ Str::limit($match->team_one->name, 15) }}</p>
                                                        </div>
                                                    @else
                                                        <img src="{{asset('assets/img/favicon/favicon.png') }}" class="iconclubesliga size-xs">
                                                        <div class="textoequipo1movil">
                                                            <p class="nameclubmovil">{{ Str::limit($match->team_one->name, 15) }}</p>
                                                        </div>
                                                    @endif

                                                    {{--  <img src="{{asset('assets/img/favicon/favicon.png') }}" class="iconclubesligamovil size-xs">
                                                    <div class="textoequipo1movil">
                                                        <p class="nameclubmovil">{{$match->team_one->name}}</p>
                                                    </div>  --}}

                                                @endif

                                        </a>
                                    </div>

                                    <div class="VSmodalvistarapida">

                                        <div class="live">

                                            @if($match->results!=null)
                                                @if($match->results->team_one_score!=null)

                                                    <p class="marcadores">{{$match->results->team_one_score}}</p>
                                                    <p class="marcadores">-</p>
                                                    <p class="marcadores">{{$match->results->team_two_score}}</p>

                                                @else
                                                    <p class="marcadores">Vs</p>
                                                @endif

                                            @else

                                                <p class="marcadores">Vs</p>
                                            @endif


                                        </div>
                                    </div>

                                    <div class="clubespartidosmovil">
                                        <a href="">


                                                @if($match->team_two->logo!=null)

                                                    <img
                                                        src="{{asset('uploads/teams/'.$match->team_two->logo) }}"
                                                        class="iconclubesligamovil size-xs">
                                                    <div class="textoequipo2movil">
                                                        <p class="nameclubmovil">{{$match->team_two->name}}</p>
                                                    </div>

                                                @else

                                                    @php
                                                        $imagenes = File::allFiles(public_path('uploads/logoteams/'));
                                                        $imagenAleatoriamodalvistav2 = collect($imagenes)->random();
                                                    @endphp

                                                    @if ($imagenAleatoriamodalvistav2)
                                                        <img src="{{ asset('uploads/logoteams/' . $imagenAleatoriamodalvistav2->getFilename()) }}" alt="Descripción de la imagen" class="iconclubesligamovil size-xs">
                                                        <div class="textoequipo2movil">
                                                            <p class="nameclubmovil"> {{ Str::limit($match->team_two->name, 15) }}</p>
                                                        </div>
                                                    @else
                                                        <img src="{{asset('assets/img/favicon/favicon.png') }}" class="iconclubesliga size-xs">
                                                        <div class="textoequipo2movil">
                                                            <p class="nameclubmovil">{{ Str::limit($match->team_two->name, 15) }}</p>
                                                        </div>
                                                    @endif

                                                    {{--  <img
                                                        src="{{asset('assets/img/favicon/favicon.png') }}"
                                                        class="iconclubesligamovil size-xs">
                                                    <div class="textoequipo2movil">
                                                        <p class="nameclubmovil">{{$match->team_two->name}}</p>
                                                    </div>  --}}

                                                @endif



                                        </a>
                                    </div>

                                </div>


                            </div>

                    @empty
                            <p class="nohaypartidomovil">No hay partido</p>
                    @endforelse





                </div>



                <div class="right">
                    <div class="player-info row align-items-center">


                        {{--  <div class="col-6">
                            @if($ultimosPartidosclubpoints->teams->logo!=null)

                                <div class="player-photo">
                                    <img src="{{asset('uploads/teams/'.$ultimosPartidosclubpoints->teams->logo) }}"
                                         class="styled__ImageStyled-sc-17v9b6o-0 ">
                                </div>
                            @else
                                <div class="player-photo">
                                    <img src="{{asset('assets/img/favicon/favicon.png') }}"
                                         class="styled__ImageStyled-sc-17v9b6o-0 ">
                                </div>
                            @endif
                        </div>  --}}
                        <div class="col-3"></div>
                         <div class="col-6 ">
                            <div class="nombreclublocal text-center" style="border-bottom-style: outset;border-color: #d4ff00;">
                                @if($partido->team_two->logo!=null)

                                    <img
                                        src="{{asset('uploads/teams/'.$partido->team_two->logo) }}"
                                        class="iconclubesliga size-xs" style="width: 2.9rem;height: 2.9rem;">
                                    <div class="textoequipo1" style="font-size: 25px;">
                                        <p class="nameclub ">{{$partido->team_two->name}}</p>
                                    </div>

                                @else
                                    @php
                                        $imagenes = File::allFiles(public_path('uploads/logoteams/'));
                                        $imagenAleatoria = collect($imagenes)->random();
                                    @endphp

                                    @if ($imagenAleatoria)
                                        <img src="{{ asset('uploads/logoteams/' . $imagenAleatoria->getFilename()) }}" alt="Descripción de la imagen" class="iconclubesliga size-xs" style="width: 2.9rem;height: 2.9rem;">
                                        <div class="textoequipo1" style="font-size: 25px;">
                                            <p class="nameclub"> {{ Str::limit($partido->team_two->name, 15) }}</p>
                                        </div>
                                    @else
                                        <img src="{{asset('assets/img/favicon/favicon.png') }}" class="iconclubesliga size-xs">
                                        <div class="textoequipo1" style="font-size: 25px;">
                                            <p class="nameclub">{{ Str::limit($partido->team_two->name, 15) }}</p>
                                        </div>
                                    @endif

                                    {{--  <img
                                        src="{{asset('assets/img/favicon/favicon.png') }}"
                                        class="iconclubesliga size-xs" style="width: 2.9rem;height: 2.9rem;">
                                    <div class="textoequipo1" style="font-size: 25px;">
                                        <p class="nameclub">{{$partido->team_two->name}}</p>
                                    </div>  --}}

                                @endif


                            </div>

                                <div class="player-detailsvistarapida divmodalvistarapida">



                                    <div class="details-rowdd">
                                        <div class="details-cell">
                                            <p style="color: #d3fe00;" class="estilosletravistarapida">
                                                <span class="letramodaljugador">Posicion:</span>
                                                <span class="info-player">{{ $positionTeamTwo }}</span>
                                            </p>
                                        </div>
                                        <div class="details-cell">
                                            <p style="color: #d3fe00;" class="estilosletravistarapida">
                                                <span class="letramodaljugador">Puntos:</span>
                                                <span class="info-player"></span> {{$totalPointsTeamTwo }}
                                            </p>
                                        </div>
                                    </div>


                                    <div class="details-rowdd">

                                        <div class="details-cell">
                                            <p style="color: #d3fe00;" class="estilosletravistarapida">
                                                <span class="letramodaljugador">PJ:</span>
                                                <span class="info-player"> {{ $totalPjTeamTwo }}</span>
                                            </p>
                                        </div>


                                        <div class="details-cell">
                                            <p style="color: #d3fe00;" class="estilosletravistarapida">
                                                <span class="letramodaljugador">PG:</span>
                                                <span class="info-player">{{ $totalPgTeamTwo }}</span>
                                            </p>
                                        </div>

                                    </div>

                                    <div class="details-rowdd">
                                        <div class="details-cell">
                                            <p style="color: #d3fe00;" class="estilosletravistarapida">
                                                <span class="letramodaljugador">PE:</span>
                                                <span class="info-player">{{ $totalPeTeamTwo }}</span>
                                            </p>
                                        </div>

                                        <div class="details-cell">
                                            <p style="color: #d3fe00;" class="estilosletravistarapida">
                                                <span class="letramodaljugador">PP:</span>
                                                <span class="info-player">{{ $totalPpTeamTwo }}</span>
                                            </p>
                                        </div>

                                    </div>

                                </div>



                        </div>
                        <div class="col-3"></div>



                    </div>
                </div>
            </div>


        </div>




      </div>
    </div>
</div>

