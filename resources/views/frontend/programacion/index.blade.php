@extends('frontend.layouts.app')
@section('title',__('Programacion'))
@section('content')
    <!-- Pantalla de carga -->
    @include('frontend.layouts.partials.bannermifutbol')
    @include('frontend.layouts.partials.sponsors')
    <div class="background-league">
        <div class="content">
            <div class="container-fluid flex-grow-1 container-p-y h-100 programacionpartidos">
                <livewire:frontend.programming :leagueSlug="$league->slug" :tournamentSlug="$tournament->slug" />
            </div>
        </div>
    </div>



@endsection
