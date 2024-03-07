<div class="modal fade animate__animated fadeIn" id="modalArbitromatch{{$arbitro->id}}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content modal-contentpersonalizado modal-contentpefil">

        <div class="contenedor-horizontal">
            <div class="elementomasdetalles">
                <button type="button" class="btn btn-primary infopartidoverMovil" data-bs-toggle="modal" data-bs-target="#modalArbitro{{ $arbitro->id }}" style="height: 42px;width: 26%;">
                    <i class="fa-sharp fa-solid fa-rotate-left fa-lg" style="color: #050505;"></i>
                    <span style="margin-right: 5px;">
                        Regresar
                    </span>

                </button>
            </div>

        </div>
        <div class="modal-header" style="text-align: center;">

          <h4 class="modal-title" id="exampleModalLabel5" style="margin: auto; ;color: #d3fe00;">Partidos Finalizados</h4>
          <div style="position: absolute;bottom: 0;left: 50%;transform: translateX(-50%);width: 100%;height: 2px;background-color: #6a7f00;"></div>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

        </div>

        {{--  <livewire:frontend.matchesreferees :leagueSlug='$league->slug' :tournamentSlug='$tournament->slug' :matchId='$partido->id'/>  --}}

        <livewire:frontend.matchesreferees :leagueSlug='$league->slug' :tournamentSlug='$tournament->slug' :id_partidoresumen='$partido->id'/>









      </div>
    </div>
</div>

