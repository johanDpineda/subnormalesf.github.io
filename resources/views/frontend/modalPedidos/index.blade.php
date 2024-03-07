<div wire:ignore.self class="modal fade animate__animated fadeIn" id="enviarpedido{{ $producto->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
            <div class="modal-header" style="text-align: center;">
            <h4 class="modal-title" id="exampleModalLabel5" style="margin: auto; ;color: #d3fe00;">Solicitud de pedido</h4>
            <div style="position: absolute;bottom: 0;left: 50%;transform: translateX(-50%);width: 100%;height: 2px;background-color: #6a7f00;"></div>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                {{ $producto->name }}

                

                @livewire('productorganizar.create')


            </div>
        </div>
    </div>
</div>