@extends('frontend.layouts.app')
@section('title',__('Resultados'))
@section('content')
    @include('frontend.layouts.partials.bannermifutbol')
    @include('frontend.layouts.partials.sponsors')
    <div class="background-league">
        <div class="content">
            <div class="container-fluid flex-grow-1 container-p-y h-100">
                <livewire:frontend.results :leagueSlug="$league->slug" :tournamentSlug="$tournament->slug" />
            </div>
        </div>
    </div>
@endsection
