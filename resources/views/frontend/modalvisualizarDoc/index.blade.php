<div class="modal fade animate__animated fadeIn" id="animationModaldoc{{ $documento->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="display: contents;">
      <div class="modal-content" style="background-color: #141414;">
        <div class="modal-header" style="text-align: center;">
            <h5 class="modal-title" id="animationModaldoc{{ $documento->id }}Label">{{__('Name of Document')}}: {{ $documento->file_name_document }}</h5>
          <div style="position: absolute;bottom: 0;left: 50%;transform: translateX(-50%);width: 100%;height: 2px;background-color: #6a7f00;"></div>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
            <!-- Aquí puedes cargar y mostrar el documento -->
            @php
                $extension = pathinfo($documento->file_name, PATHINFO_EXTENSION);
                @endphp


                @if ($extension === 'pdf')
                <embed src="{{ asset('uploads/leagues/files/'.$documento->file_name) }}" class="modomovilresoluciones">
            @elseif (in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'bmp']))
                <img  src="{{ asset('uploads/leagues/files/'.$documento->file_name) }}" width="100%" height="auto">
            @else
                <p>Formato de archivo no compatible</p>
            @endif







        </div>




      </div>
    </div>
</div>


