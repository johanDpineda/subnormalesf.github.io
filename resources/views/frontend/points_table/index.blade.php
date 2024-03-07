@extends('frontend.layouts.app')
@section('title',__('Points table'))
@section('content')

    <!-- Pantalla de carga -->

@include('frontend.layouts.partials.bannermifutbol')
@include('frontend.layouts.partials.sponsors')
<div class="background-league">
        <div class="content">
            <div class="container">
                <livewire:frontend.table-points :leagueSlug="$league->slug" :tournamentSlug="$tournament->slug" />
            </div>
        </div>
    </div>
@endsection
