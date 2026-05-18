</html><!DOCTYPE html>
<html lang="en">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<body>
<style>.movies-container {
    display: grid;
    grid-template-columns: repeat(12, 1fr);
    gap: 15px;
}

@media (max-width: 1400px) {
    .movies-container {
        grid-template-columns: repeat(6, 1fr);
    }
}

@media (max-width: 1000px) {
    .movies-container {
        grid-template-columns: repeat(4, 1fr);
    }
}

@media (max-width: 700px) {
    .movies-container {
        grid-template-columns: repeat(2, 1fr);
    }
}</style>
  
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

<form action="/movie/{{ $movie->id }}" method="POST">

    @csrf
    @method('PUT')

    <td>
        <input type="text"
               name="title"
               value="{{ $movie->title }}">
    </td>

    <td>
        <input type="number"
               name="year"
               value="{{ $movie->year }}">
    </td>
    <td>
        <input type="text"
               name="genre"
               value="{{ $movie->genre }}">
    </td>
    <td>
        <input type="number"
               step="0.1"
               name="rate"
               value="{{ $movie->rate }}">
    </td>
    <td>
        <select name="type">
            <option value="upcoming"
                @if($movie->type == 'upcoming') selected @endif>
                upcoming
            </option>

            <option value="top_rated"
                @if($movie->type == 'top_rated') selected @endif>
                top rated
            </option>

            <option value="trending"
                @if($movie->type == 'trending') selected @endif>
                trending
            </option>
                <option value="series"
                    @if($movie->type == 'series') selected @endif>
                    series
                </option>
        </select>
    </td>    <td>
        <button type="submit">
            Save
        </button>
    </td>

</form>

<td>
    <form action="/movie/{{ $movie->id }}" method="POST">

        @csrf
        @method('DELETE')

        <button type="submit">
            Delete
        </button>

    </form>
</td>

</tr>

@endforeach
    
  

  </table>
@else

      <!-- Card 1 -->
     <div class="movies-container">
    @foreach($movies as $index => $movie)
        <div class="movie-card" style="animation-delay: {{ $index * 0.05 }}s">
            <span class="rank-badge">{{ $movie->rank }}</span>

            <img class="movie-poster" src="{{ $movie->poster }}" alt="{{ $movie->title }}">

            <div class="movie-overlay"></div>

            <div class="movie-overlay-hover">
                <div class="play-btn">
                    <a href="/movie/{{ $movie->id }}">▶</a>
                </div>
            </div>

            <div class="movie-info">
                <div class="movie-title">{{ $movie->title }}</div>

                <div class="movie-rating">
                    <span class="stars">
                        <span class="star filled">★</span>
                        <span class="star filled">★</span>
                        <span class="star filled">★</span>
                        <span class="star filled">★</span>
                        <span class="star half">★</span>
                    </span>
                    {{ $movie->rate }}
                </div>
            </div>
        </div>
    @endforeach
</div>
  
@endif

</section>

    </div>