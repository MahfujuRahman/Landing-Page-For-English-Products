
@extends('Frontend.layouts.master')

@section('content')

    <main class="main">
        @include('Frontend.home.includes.hero')
        @include('Frontend.home.includes.video')
        @include('Frontend.home.includes.about')
        @include('Frontend.home.includes.service')
        @include('Frontend.home.includes.order')
    </main>

@endsection
