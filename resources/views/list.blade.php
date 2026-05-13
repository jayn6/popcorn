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