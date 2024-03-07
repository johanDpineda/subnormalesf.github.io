@extends('frontend.layouts.app')
@section('title',__('Equipos'))

@section('content')

    <!-- Pantalla de carga -->
        @include('frontend.layouts.partials.bannermifutbol')
        @include('frontend.layouts.partials.sponsors')
        <div class="background-league">
            <div class="content">
                <livewire:frontend.teams :leagueSlug="$league->slug" :tournamentSlug="$tournament->slug" />
            </div>
        </div>
@endsection
