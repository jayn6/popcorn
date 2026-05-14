@extends('layouts.app')

@section('content')

<h1>My Watchlist</h1>

<div class="scroll-row" style="padding-top: 80px;">

@foreach($watchlist as $item)

    <div class="movie-card">

        <img class="movie-poster" src="{{ $item->movie->poster }}" alt="">

        <div class="movie-info">

            <div class="movie-title">
                {{ $item->movie->title }}
            </div>

            <div class="movie-rating">
                ⭐ {{ $item->movie->rate }}
            </div>

        </div>

    </div>

@endforeach

</div>

@endsection