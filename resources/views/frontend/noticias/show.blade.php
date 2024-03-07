@extends('frontend.layouts.app')
@section('title',__($newsfirst->title))
@section('content')
    <!-- Pantalla de carga -->
    @include('frontend.layouts.partials.bannermifutbol')
    @include('frontend.layouts.partials.sponsors')

<div class="background-league">
    <div class="container" style="background-color: #f2f2f2;box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);">



        <div class="ligaequiposd mt-3">

            <div class="row">

                <div id="articuloheader">
                    <h3 class="articulotitulo mt-3">
                        <a href="">
                            <span class="titlearticle">
                                {{ $newsfirst->title }}

                            </span>
                        </a>

                    </h3>

                    <h1 class="tituloprincipalarticulo">
                        {{$newsfirst->header}}
                    </h1>

                    <span class="subtitlearticulo">
                        <p>
                            {{$newsfirst->subtitle}}
                        </p>
                    </span>

                </div>



                    <div class="col-md-8">
                        <div class="row ">
                                <div class="col-12 mb-4 news-item-ntc contnoticias ">
                                    <div class="row">
                                        <div id="imagenarticulo">
                                            @if($newsfirst->image != null)
                                                <img src="{{ asset('uploads/news/' . $newsfirst->image) }}" alt="News Image" class="img-fluidnoticias">
                                            @else
                                                <img src="{{ asset('uploads/store/'.$store->image) }}" alt="Default Image" class="img-fluidnoticiasopacitynews" style="width: 50%">
                                            @endif

                                        </div>

                                        <div class="descriptionarticulo">

                                            {!! $newsfirst->description !!}

                                        </div>



                                    </div>
                                </div>


                        </div>

                    </div>

                   

                    <div class="col-md-4">

                        <div id="cajanoticiasprincipales">

                            <section class="divnoticiasrecientes">
                                <h4 class="titlenewrecientes">
                                    <span class="titlenewrecientes">Noticias Recientes</span>



                                        @forelse ($ultimasnoticias as $ultimasnoticia)

                                        <ul class="listnewrecientes">
                                            <li>
                                                <a href=" {{ route('noticias.show', ['store_slug' => $store->slug,'Noticias_slug'=>$ultimasnoticia->slug]) }}">
                                                    {{ $ultimasnoticia->header }}


                                                </a>
                                            </li>

                                        </ul>

                                    @empty
                                        <div class="col-12">
                                            <p class="text-center">No hay Noticas</p>
                                        </div>
                                    @endforelse

                                </h4>

                            </section>

                          

                        </div>

                    </div>


                    








            </div>
                <div class="for_slick_slider_noticias">
                    @foreach ($imagenewsfirst as $imagenewsfirsts)
                        <div class="itemsfsd">

                            <img src="{{ asset('uploads/gallery/' . $imagenewsfirsts->image_path) }}" alt="News Image" >
                            <div class="overlayff"></div>

                        </div>
                    @endforeach

                    @if ($imagenewsfirst->isEmpty())
                    <div class="mensaje-no-productos flicker-4">
                        <p>No hay Galeria disponibles</p>
                    </div>
                @endif
                </div>



        </div>
    </div>






</div>





@endsection



