@extends('frontend.layouts.app')
@section('title',__('Mi.futbol'))

@section('content')


    <div id="carouselExample" class="carousel slide">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{asset('assets/img/bannerstoresv2.jpg') }}"
                    class="d-block w-100 bannerjugadortorneo" alt="...">
            </div>
        </div>
       
        <div class="lineaverde"></div>
    </div>

    <div class="container" style="background-color: #f2f2f2;box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);">

        <h3 style="text-align: center;margin-top: 10px;font-size: 25px;font-family: 'Roboto', sans-serif;color: #0d0d0d;">Nuestros Productos</h3>
        
        <div class="for_slick_slider_prendas multiple-items">
          @foreach ($productosStores as $productosStore)
              <div class="itemsprendas">
                  @if($productosStore->image != null)
                      <img src="{{ asset('uploads/productos/' . $productosStore->image) }}" alt="News Image">
                  @else
                      <img src="{{ asset('assets/img/logosinproducto.jpg') }}" alt="News Image">
                  @endif
                  <div class="overlayb"></div>
              </div>
          @endforeach
        </div>
      
      @if ($productosStores->isEmpty())
          <div class="mensaje-no-productos flicker-4">
              <p>No hay productos disponibles</p>
          </div>
      @endif
      
      

    

        <section class="container product-thumb-slider section-padding" >
            <div class="container" style="background-color: #a2b3d15c;box-shadow: 0 0 10px rgb(39 35 35 / 25%);border-radius: 10px">
              <div class="text-center pb-3">
                <h3 class="mb-0 h3 fw-bold" style="text-align: center;margin-top: 10px;font-size: 25px;font-family: 'Roboto', sans-serif;color: #0d0d0d;">Sobre {{$store->name}}</h3>
              </div>
              <div class="row" style="display: flex;justify-content: center;align-items: center;">

                <div class="col-xl-3 col-md-6 mb-4 ">
                  <div class="card depth border-0 rounded-0 border-bottom border-primary border-3 w-100 contenhover"  style="border-bottom: 3px solid #35a1d300 !important;border-radius: 12px !important;">
                    <div class="card-body text-center contenhoverzd" style="background: #0e1a40;
                    box-shadow: 0 0.25rem 1.25rem rgb(39 40 41 / 40%);
                    border-radius: 12px;">
                      <div class="h1 fw-bold my-2 text-primary">
                        <i class="fa-solid fa-cart-flatbed" style="color: #ffffff;"></i>
                      </div>
                      <h5 class="fw-bold">Numero de Productos</h5>
                      <p class="mb-0" style="font-size: xx-large;font-family: 'Roboto', sans-serif;">
                        @if($store->products->count()!=null)
                          {{$store->products->count()}}
                        @else
                          0
                        @endif
                      </p>
                    </div>
                  </div>
                </div>

                <div class="col-xl-3 col-md-6 mb-4 ">
                  <div class="card depth border-0 rounded-0 border-bottom border-danger border-3 w-100 contenhover"  style="border-bottom: 3px solid #35a1d300 !important;border-radius: 12px !important;">
                    <div class="card-body text-center contenhoverzd" style="background: #0e1a40;
                    box-shadow: 0 0.25rem 1.25rem rgb(39 40 41 / 40%);
                    border-radius: 12px;">
                      <div class="h1 fw-bold my-2 text-danger">
                        <i class="fa-solid fa-user " style="color: #ffffff;"></i>
                      </div>
                      <h5 class="fw-bold">Numero de Clientes</h5>
                      <p class="mb-0" style="font-size: xx-large;font-family: 'Roboto', sans-serif;">

                        @if($countHistoryentregados!=null)

                          {{$countHistoryentregados}}

                        @else
                            0
                        @endif
                        
                      </p>
                    </div>
                  </div>
                </div>

                <div class="col-xl-3 col-md-6 mb-4 ">
                  <div class="card depth border-0 rounded-0 border-bottom border-success border-3 w-100 contenhover"  style="border-bottom: 3px solid #35a1d300 !important;border-radius: 12px !important;">
                    <div class="card-body text-center contenhoverzd" style="background: #0e1a40;
                    box-shadow: 0 0.25rem 1.25rem rgb(39 40 41 / 40%);
                    border-radius: 12px;">
                      <div class="h1 fw-bold my-2 text-success">
                        <i class="fa-solid fa-basket-shopping " style="color: #ffffff;"></i>
                      </div>
                      <h5 class="fw-bold">Productos vendidos</h5>
                      <p class="mb-0" style="font-size: xx-large;font-family: 'Roboto', sans-serif;">

                        @if($countHistory!=null)

                          {{$countHistory}}

                        @else
                            0
                        @endif



                        
                      </p>
                    </div>
                  </div>
                </div>

                <div class="col-xl-3 col-md-6 mb-4 ">
                  <div class="card depth border-0 rounded-0 border-bottom border-success border-3 w-100 contenhover"  style="border-bottom: 3px solid #35a1d300 !important;border-radius: 12px !important;">
                    <div class="card-body text-center contenhoverzd" style="background: #0e1a40;
                    box-shadow: 0 0.25rem 1.25rem rgb(39 40 41 / 40%);
                    border-radius: 12px;">
                      <div class="h1 fw-bold my-2 text-success">
                        <i class="fa-solid fa-envelope-circle-check" style="color: #ffffff;"></i>
                      </div>
                      <h5 class="fw-bold">Productos Solicitados</h5>
                      <p class="mb-0" style="font-size: xx-large;font-family: 'Roboto', sans-serif;">
                        @if($store->productspedidos->count()!=null)
                          {{$store->productspedidos->count()}}
                        @else
                          0
                        @endif
                      </p>
                    </div>
                  </div>
                </div>

              </div>
              <!--end row-->
            </div>
        </section>

      

      
        <div class="container mt-4">
            <h4 class="text-center " style="font-size: 25px; font-family: 'Roboto', sans-serif;color: #0d0d0d;">Promociones</h4>
    
            <div class="multiple-items carousel-inner">
    
                @foreach ($productospromotions as $productospromotion)
    
                <div class="card custom-card-width"> <!-- Agregamos la clase custom-card-width -->
                    <img src="{{ asset('uploads/productos/' . $productospromotion->products->image) }}" class="card-img-top" style="width: 100%;" alt="{{ $productospromotion->products->name }}">
                    <div class="card-body">
                        <h5 class="card-title" style=" text-transform: uppercase;">{{ $productospromotion->products->name }}</h5>
                        
    
                        @if ($productospromotion->discounted_price !== null && $productospromotion->discounted_price < $productospromotion->products->price)
                            <del class="original-price">Precio Antes: ${{ $productospromotion->products->price }}</del>
                            <p class="discount-price">Precio con Descuento: ${{ $productospromotion->discounted_price }}</p>
                        @else
                            <p class="price">Precio: ${{ $productospromotion->products->price }}</p>
                        @endif
    
                        <a href="#" class="btn btn-primary">Ver detalles</a>
                    </div>
                </div>
    
                @endforeach
                
            </div>

            @if ($productospromotions->isEmpty())
              <div class="mensaje-no-productos flicker-4">
                  <p>No hay Promociones disponibles</p>
              </div>
            @endif




        </div>

        
        <div class="container mt-4 mb-2">
          <div class="card" style="background-color: #a2b3d15c;box-shadow: 0 0 10px rgb(39 35 35 / 25%);border-radius: 10px">
            <div class="card-body">
             
              <div class="row">
              
                  <div class="col-md-6">

                    <h4 class="text-center " style="font-size: 25px; font-family: 'Roboto', sans-serif;color: #0d0d0d;">Nuestras Categorias</h4>

                    <div class="carousel" data-flickity='{ "freeScroll": true, "wrapAround": true,"autoPlay": true,  "pageDots": false  }'>

                      @foreach ($categories as $categorie)
                        <div class="carousel-cellfdfd" style="background-color: #f2f2f2;">
                          <h5 class="card-title" style="text-align: center;color:#0d0d0d">{{ $categorie->name }}</h5>
                        </div>
                      @endforeach

                    </div>



                      @if ($categories->isEmpty())
                      <div class="mensaje-no-productos flicker-4">
                          <p>No hay Categorias disponibles</p>
                      </div>
                    @endif
                      
                  </div>
               
      
                <div class="col-md-6">
                  <h4 class="text-center " style="font-size: 25px; font-family: 'Roboto', sans-serif;color: #0d0d0d;">Eventos</h4>

                    <div class="carousel" data-flickity='{ "autoPlay": true,  "pageDots": false }'>

                      @forelse ($eventsstotres as $eventsstore)

                        <div class="carousel-cell">

                          <div class="cardevents">
                            <h5 class="card-header card-title">{{$eventsstore->title}}</h5>

                            <div style="display: flex;justify-content: center;align-items: center;">

                              @if($eventsstore->image != null)
                                <img src="{{ asset('uploads/events/' . $eventsstore->image) }}" alt="News Image" class="img-events">
                              @else
                                  <img src="{{ asset('uploads/leagues/'.$league->image) }}" alt="Default Image" class="img-fluidnoticiasopacity">
                              @endif

                            </div>

                           

                            <div class="date">{{$eventsstore->formatted_date }}</div>
                           
                          </div>

                          


                        </div>
                          
                      @empty

                        <div class="mensaje-no-productos flicker-4">
                          <p>No hay eventos Programados</p>
                        </div>
                          
                      @endforelse

                    </div>
                 
                </div>
              </div>
      
            </div>
          </div>
        </div>
    </div>
    


    
    
    
   

        


        
    
      
    
    
@endsection
