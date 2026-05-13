

</html><!DOCTYPE html>
<html lang="en">

<body>

  
@extends('layouts.app')

@section('content')
  <!--  HERO  -->
  <section class="hero">
    <div class="hero-bg"></div>
    <div class="hero-gradient"></div>
    <div class="hero-content">
      <div class="hero-badge">🔥 Featured Tonight</div>
      <h1 class="hero-title">Project Hail Mary</h1>
      <div class="hero-meta">
        <span class="year">2026</span>
        <span class="dot"></span>
        <span>2h 36m</span>
        <span class="dot"></span>
        <span>Sci-Fi · Adventure</span>
        <span class="dot"></span>
        <span class="hero-rating">★ 8.3</span>
      </div>
      <p class="hero-desc">
A science teacher wakes up alone on a spaceship. As his memory returns, he uncovers a mission to stop a mysterious substance killing Earth's sun, and realizes that an unexpected friendship may be the key.      </p>
      <div class="hero-btns">
        <a href="#" class="btn-primary">▶ View Movie</a>
        <a href="#" class="btn-ghost">＋ Add to Watchlist</a>
      </div>
    </div>
  </section>

  <!-- ═══════════════════════════════ STATS BAR ═══════════════════════════════ -->
  <div class="stats-bar">
    <div class="stat-item">
      <span class="stat-num">2.4M</span>
      <span class="stat-label">Films Tracked</span>
    </div>
    <div class="stat-item">
      <span class="stat-num">840K</span>
      <span class="stat-label">Active Users</span>
    </div>
    <div class="stat-item">
      <span class="stat-num">12M+</span>
      <span class="stat-label">Reviews Written</span>
    </div>
    <div class="stat-item">
      <span class="stat-num">500K</span>
      <span class="stat-label">Watchlists Created</span>
    </div>
  </div>

  <!-- trending -->
  <section class="section">
    <div class="section-header">
      <h2 class="section-title"><span class="icon">🔥</span> Trending Now</h2>
      <a href="#" class="section-see-all">See All →</a>
    </div>
    <hr>
    <br>
    <div class="scroll-row">

      <!-- Card 1 -->
       @foreach($trending as $movie)

      <div class="movie-card">
        <span class="rank-badge">{{ $movie->year }}</span>
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


    </div>
  </section>

  <!-- top rated -->
  <section class="section" style="padding-top: 0;">
    <div class="section-header">
      <h2 class="section-title"><span class="icon">⭐</span> Top Rated All Time</h2>
      <a href="#" class="section-see-all">See All →</a>
    </div>
    <hr>
    <br>
    <div class="scroll-row">

      @foreach($topRated as $movie)

      <div class="movie-card">
        <span class="rank-badge">{{ $movie->year }}</span>
        <img class="movie-poster" src="{{ $movie->poster }}" alt="{{ $movie->title }}">
        <div class="movie-overlay"></div>
        <div class="movie-overlay-hover"><div class="play-btn"  ><a href="/movie/{{ $movie->id }}">▶</a></div></div>
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

    </div>
  </section>

  <!-- upcoming -->
  <section class="section" style="padding-top: 0;">
    <div class="section-header">
      <h2 class="section-title"><span class="icon">🎬</span> Upcoming Releases</h2>
      <a href="#" class="section-see-all">See All →</a>
    </div>
    <hr>
    <br>
    <div class="scroll-row">

      @foreach($upcoming as $movie)

      <div class="movie-card">
        <span class="rank-badge">{{ $movie->year }}</span>
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

    </div>
  </section>

  <!-- ═══════════════════════════════ CTA SECTION ═══════════════════════════════ -->
  <div class="cta-section">
    <div class="cta-text">
      <h2>Start Tracking.<br><em>Love Film More.</em></h2>
      <p>Join over 840,000 film lovers who use Popcorn to discover hidden gems, track their cinema journey, and connect with a community that actually cares about movies.</p>
    </div>
    <div class="cta-actions">
      <a href="#" class="btn-primary" style="padding: 0.9rem 2rem; font-size: 0.95rem;">🍿 Create Free Account</a>
      <a href="#" class="btn-ghost" style="padding: 0.9rem 2rem; font-size: 0.95rem;">Browse Movies</a>
    </div>
  </div>



</body>
</html>