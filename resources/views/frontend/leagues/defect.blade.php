@extends('frontend.layouts.app')
@section('title',__('Mi.futbol'))

@section('content')
    <div id="carouselExample" class="carousel slide">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{asset('assets/img/web/bannerprincipaloriginal.webp') }}"
                     class="d-block w-100 bannerjugadortorneo" alt="...">
            </div>
        </div>
        <div class="logomifutbol">
            <img src="{{asset('assets/img/web/logofutbol.webp') }}" class="bannerlogomifutbol">
        </div>
        <div class="lineaverde"></div>
    </div>
    @include('frontend.layouts.partials.sponsors')
    <div class="background-league">
        <div class="content">
            <div class="container d-flex justify-content-center align-items-center" style="min-height:100vh">
                <div class="row h-100 table  table_body">
                    <div class="col-md-12 text-center">
                        <h1>Actualmente no tiene ningún torneo para mostrar</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
