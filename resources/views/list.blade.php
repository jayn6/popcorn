</html><!DOCTYPE html>
<html lang="en">

<body>

  
@extends('layouts.app')

@section('content')
  <section class="section">

  <div class="scroll-row">

      <!-- Card 1 -->
@foreach($movies as $movie)
      <div class="movie-card">
        <span class="rank-badge">{{ $movie->rank }}</span>
        <img class="movie-poster" src="{{ $movie->poster }}" alt="{{ $movie->title }}">
        <div class="movie-overlay"></div>
        <div class="movie-overlay-hover"><div class="play-btn"><a href="/movie/{{ $movie->id }}">▶</a></div></div>
        <div class="movie-info">
          <div class="movie-title">{{ $movie->title }}</div>
          <div class="movie-rating">
            <span class="stars">
              <span class="star filled">★</span><span class="star filled">★</span><span class="star filled">★</span><span class="star filled">★</span><span class="star half">★</span>
            </span>
            {{ $movie->rate }}
          </div>
        </div>
      </div>
      @endforeach
</section>

    </div>