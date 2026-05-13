</html><!DOCTYPE html>
<html lang="en">

<body>

  
@extends('layouts.app')

@section('content')
<br>
<br>
  <section class="section">

  <div class="scroll-row">
@if(auth()->user()->role === 'admin')
  <table>
    <tr>
      <th>Title</th>
      <th>Year</th>
      <th>Genre</th>
      <th>Rating</th>
      <th>Type</th>
    </tr>
    @foreach($movies as $movie)
    <tr>
      <td><input type="text" value="{{ $movie->title }}"></td>
      <td><input type="number" value="{{ $movie->year }}"></td>
      <td><input type="text" value="{{ $movie->genre }}"></td>
      <td><input type="number" step="0.1" value="{{ $movie->rate }}"></td>
      <td>
        <select name="" id=""><option value="">upcoming</option>
      <option value="">top_rated</option>
      <option value="">trending</option></select>
    </td>
      </select>
    </td>
     <td>
        <form action="/movie/{{ $movie->id }}" method="POST">

          @csrf

          @method('DELETE')

          <button type="submit">
            Delete Movie
          </button>

        </form>
    </td>
       @endforeach

    
  

  </table>
@else

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
  
@endif

</section>

    </div>