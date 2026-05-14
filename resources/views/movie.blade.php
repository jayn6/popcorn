<style>
    /* =========================
   MOVIE PAGE
========================= */

.movie-hero{
    position:relative;
    min-height:100vh;
    overflow:hidden;
    background:#0b0f19;
}

/* BACKDROP */
.hero-backdrop{
    position:absolute;
    top:0;
    left:0;
    width:100%;
    height:420px;

    background-size:cover;
    background-position:center;

    filter:brightness(0.45);
}

/* DARK OVERLAY */
.hero-overlay{
    position:absolute;
    inset:0;

    background:
    linear-gradient(to bottom,
    rgba(0,0,0,0.2),
    #0b0f19 45%);

    z-index:1;
}

/* MAIN LAYOUT */
.movie-wrapper{
    position:relative;
    z-index:2;

    max-width:1400px;

    margin:auto;

    display:grid;

    grid-template-columns:
    260px
    1fr
    260px;

    gap:40px;

    padding-top:240px;
    padding-left:40px;
    padding-right:40px;
    padding-bottom:60px;
}

/* LEFT */
.poster-box{
    width:220px;

    border-radius:12px;
    overflow:hidden;

    box-shadow:
    0 10px 40px rgba(0,0,0,0.7);
}

.poster-box img{
    width:100%;
    display:block;
}

/* CENTER */
.movie-title{
    color:white;
    font-size:48px;
    margin-bottom:10px;
}

.movie-meta{
    display:flex;
    gap:12px;

    color:#aaa;

    margin-bottom:20px;
}

.movie-description{
    color:#d0d0d0;

    line-height:1.8;

    max-width:750px;

    margin-bottom:25px;
}

/* TAGS */
.movie-tags{
    display:flex;
    flex-wrap:wrap;
    gap:10px;

    margin-bottom:40px;
}

.movie-tags span{
    background:#18202f;
    color:#8cc8ff;

    padding:6px 14px;

    border-radius:5px;

    font-size:13px;
}

/* RIGHT SIDE */
.action-box{
    background:#111827;

    border-radius:10px;

    overflow:hidden;

    margin-bottom:20px;
}

.action-box button{
    width:100%;

    background:none;
    border:none;

    color:white;

    padding:16px;

    border-bottom:1px solid #1f2937;

    cursor:pointer;

    transition:0.3s;
}

.action-box button:hover{
    background:#1e293b;
}

/* STATS */
.stats-box{
    background:#111827;

    border-radius:10px;

    padding:20px;
}

.stat{
    margin-bottom:20px;
}

.stat h3{
    color:#4ade80;
    font-size:28px;
}

.stat p{
    color:#9ca3af;
}

/* REVIEWS */
.review-section{
    margin-top:30px;
}

.review-section h2{
    color:white;
    margin-bottom:20px;
}

.review-card{
    background:#111827;

    border-radius:10px;

    padding:20px;

    margin-bottom:15px;
}

.review-user{
    color:#facc15;

    margin-bottom:10px;

    font-weight:bold;
}

.review-text{
    color:#d1d5db;

    line-height:1.7;
}

/* RESPONSIVE */
@media(max-width:1100px){

    .movie-wrapper{
        grid-template-columns:1fr;
    }

    .movie-left{
        display:flex;
        justify-content:center;
    }

    .movie-right{
        max-width:500px;
    }

}

/* REVIEW FORM */
.review-form-box{
    margin-top:20px;

    background:#111827;

    padding:20px;

    border-radius:12px;

    border:1px solid #1f2937;

    max-width:600px;
}

.review-form-box form{
    display:flex;
    flex-direction:column;
    gap:15px;
}

.review-input{
    background:#0f172a;

    border:1px solid #374151;

    border-radius:10px;

    padding:14px;

    color:white;

    resize:none;

    font-size:15px;
}

.review-input:focus{
    outline:none;

    border-color:#4ade80;
}

.rating-input{
    width:160px;

    background:#0f172a;

    border:1px solid #374151;

    border-radius:10px;

    padding:12px;

    color:white;
}

.rating-input:focus{
    outline:none;

    border-color:#facc15;
}

.submit-review-btn{
    width:200px;

    background:#4ade80;

    color:#111827;

    border:none;

    padding:12px;

    border-radius:10px;

    font-weight:bold;

    cursor:pointer;

    transition:0.3s;
}

.submit-review-btn:hover{
    transform:translateY(-2px);

    background:#22c55e;
}

</style>
@extends('layouts.app')

@section('content')

<!-- HERO BACKDROP -->
<section class="movie-hero">

    <!-- BACKGROUND IMAGE -->
    <div class="hero-backdrop"
         style="background-image:url('{{ $movie->poster }}')">
    </div>

    <!-- DARK OVERLAY -->
    <div class="hero-overlay"></div>

    <!-- MAIN CONTENT -->
    <div class="movie-wrapper">

        <!-- LEFT SIDE -->
        <div class="movie-left">

            <!-- POSTER -->
            <div class="poster-box">
                <img src="{{ $movie->poster }}" alt="">
            </div>

        </div>

        <!-- CENTER -->
        <div class="movie-center">

            <h1 class="movie-title">
                {{ $movie->title }}
            </h1>

            <div class="movie-meta">
                <span>{{ $movie->year }}</span>
                <span>•</span>
                <span>{{ $movie->genre }}</span>
                <span>•</span>
                <span>★ {{ $movie->rate}}</span>
            </div>

            <p class="movie-description">
                {{ $movie->description }}
            </p>

            <!-- TAGS -->
            <div class="movie-tags">
                <p style="color: #aaa; font-size: 16px; margin-bottom: 5px;">Actors:</p>
                <p class="movie-actors">
                    {{ $movie->actors }}
                </p>
            </div>

            @if(auth()->check())

            <div id="reviewForm" class="review-form-box" style="display:none">

                <form action="{{ route('reviews.store') }}" method="POST">
                    @csrf

                    <input type="hidden" name="id_movie" value="{{ $movie->id }}">

                    <textarea name="review_text" rows="4" placeholder="Write your review..." class="review-input">
                    </textarea>
                    <div>
                        <input type="number" name="rating" min="1" max="10" placeholder="Rating (1-10)" class="rating-input">

                        <button type="submit" class="submit-review-btn">
                            Submit
                        </button>
                    </div>
                    

                </form>

            </div>

            @endif

            <!-- REVIEWS -->
            <div class="review-section">

                <h2>Popular Reviews</h2>

                @foreach($movie-> reviews as $review)
                <div class="review-card">
                    <div class="review-user">
                        @php
                        $stars = round($review->rating / 2);
                        @endphp
                        <div style="color:#facc15;">
                            {{ str_repeat('★', $stars) }}
                            {{ str_repeat('☆', 5 - $stars) }}
                        </div>
                        • {{ $review->user->name }}
                        {{$review->rating}}/10
                    </div>
                    <div class="review-text">
                        {{ $review->review_text }}
                    </div>
                </div>
                @endforeach

                

            </div>

        </div>

        <!-- RIGHT SIDE -->
        <div class="movie-right">

            <div class="action-box">

                <button>♡ Like</button>
                <button onclick="toggleReviewForm()">★ Rate</button>
                <form action="/watchlist/add/{{ $movie->id }}" method="POST">
                    @csrf
                    <button type="submit">➕ Watchlist</button>
                </form>
                <a href="https://www.playimdb.com/{{ $movie->title }}/{{ $movie->imdb_id }}" target="_blank">
                    <button>watch</button>

                </a>

            </div>

            <div class="stats-box">

                <div class="stat">
                    <h3>{{ number_format($movie->reviews->avg('rating'), 1) }}</h3>
                    <p>Average Rating</p>
                </div>

                <div class="stat">
                    <h3>{{ $movie->reviews->count() }}</h3>                    
                    <p>Reviews</p>
                </div>

            </div>

        </div>

    </div>

</section>

@endsection

<script>
    function toggleReviewForm() {
        const form = document.getElementById('reviewForm');
        if (form.style.display === 'none') {
            form.style.display = 'block';
        } else {
            form.style.display = 'none';
        }
    }
</script>
