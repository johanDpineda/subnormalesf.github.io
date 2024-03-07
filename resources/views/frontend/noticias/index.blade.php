@extends('frontend.layouts.app')
@section('title',__('News'))
@section('content')
    <!-- Pantalla de carga -->
    @include('frontend.layouts.partials.bannermifutbol')
    @include('frontend.layouts.partials.sponsors')

<div class="background-league">
    <div class="container" style="background-color: #f2f2f2;box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);">


        <div class="tituloresulocion" style="margin-top: 50px;">
            <h1 class="tituloequiposliga"><span class="tituloequiposliga ">{{__('News')}} de {{$store->name}}</span></h1>
        </div>

        <livewire:frontend.newsview :storeSlug="$store->slug"  />

    </div>
</div>





@endsection
