@extends('frontend.layouts.app')
@section('title',__('Tabla Valla menos vencida'))
@section('content')
    <!-- Pantalla de carga -->
    <div class="contenedorgoleadorestorneo">
        @include('frontend.layouts.partials.bannermifutbol')
        @include('frontend.layouts.partials.sponsors')
        <div class="background-league">
            <div class="content">
                <livewire:frontend.goal-keepers :leagueSlug="$league->slug" :tournamentSlug="$tournament->slug" />
            </div>
        </div>
    </div>
@endsection
