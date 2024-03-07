@extends('frontend.layouts.app')
@section('title',$producto->name)

@section('content')

    <!-- Pantalla de carga -->
    @include('frontend.layouts.partials.bannermifutbolequipo')
    @include('frontend.layouts.partials.sponsors')
    <div class="infoequipoliga">

      <div class="container">
        <div class="row mb-3">
        
          <div class="col-md-6 mt-3" >

            <div class="col-md-12">

            
                @if($producto->image!=null)
                  <img src="{{asset('uploads/productos/'.$producto->image) }}" style="width: 60%;box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);border-radius: 10px;" class="mx-auto d-block mb-3" >
                @else
                  <img src="{{asset('assets/img/logosinproducto.jpg') }}" alt="News Image" class="mx-auto d-block" >
                @endif
              
              

            
                <div class="card descripcionproducto" style="background: #e6e7e7;color: black;height: 271px;">
                  {!! $producto->description !!}
                </div>
             

            </div>


         

             

          </div>

         

          <div class="col-md-6 mt-3 shake-top">
            <div class="heartbeat">
              <h1 class="mb-2" style="
              color: black;
              font-size: 24px;
              font-weight: bold;
              display: flex;
              justify-content: center;
          ">Solicita aqui tu pedido</h1>

            </div>
             

       
  
            <div class="card" style="background: #FFFEF5;">
             
              @livewire('productorganizar.create')
            </div>

            

            

            

          </div>

        </div>


      </div>
     
      {{-- @include('frontend.modalPedidos.index') --}}

      
    </div>





@endsection


