@extends('frontend.layouts.app')
@section('title',__('Resolutions'))
@section('content')
    <!-- Pantalla de carga -->
    @include('frontend.layouts.partials.bannermifutbol')
    @include('frontend.layouts.partials.sponsors')

<div class="background-league">
    <div class="container">


        <div class="tituloresulocion" style="margin-top: 50px;">
            <h1 class="tituloequiposliga"><span class="tituloequiposliga ">{{__('Resolutions')}}</span></h1>
        </div>

        <livewire:frontend.resolutions :leagueSlug='$league->slug' :tournamentSlug='$tournament->slug' />

    </div>
</div>





@endsection
