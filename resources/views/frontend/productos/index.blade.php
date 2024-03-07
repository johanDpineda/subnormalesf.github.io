@extends('frontend.layouts.app')
@section('title',__('Products'))

@section('content')

    <!-- Pantalla de carga -->
        @include('frontend.layouts.partials.bannermifutbol')
        @include('frontend.layouts.partials.sponsors')
        <div class="background-league">
            <div class="content">
                <livewire:frontend.products :storeSlug="$store->slug" />

            </div>
        </div>
@endsection
