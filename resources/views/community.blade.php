<style>

/* =========================
   COMMUNITY PAGE
========================= */

.review-section{
    max-width:1000px;
    margin:140px auto 40px;
    padding:0 20px;
}

.review-card{
    background:#111827;
    border-radius:14px;
    padding:20px;

    margin-bottom:20px;

    display:flex;
    gap:20px;

    border:1px solid #1f2937;
}

.review-movie img{
    width:100px;
    height:140px;
    object-fit:cover;
    border-radius:10px;
}

.review-content{
    flex:1;
    display:flex;
    flex-direction:column;
}

.review-user{
    color:#facc15;
    font-size:18px;
    margin-bottom:4px;
}

.movie-name{
    color:#9ca3af;
    margin-bottom:12px;
}

.review-text{
    color:#e5e7eb;
    line-height:1.7;
    margin-bottom:15px;
}

.review-stars{
    color:#facc15;
    font-size:22px;
    margin-bottom:15px;
}

.review-bottom{
    display:flex;
    justify-content:space-between;
    align-items:center;

    margin-top:auto;
}

.review-date{
    color:#6b7280;
    font-size:14px;
}

.review-actions{
    display:flex;
    gap:10px;
}

.review-actions button{
    background:#1f2937;
    border:none;
    color:white;

    width:38px;
    height:38px;

    border-radius:50%;
    cursor:pointer;

    transition:0.2s;
}

.review-actions button:hover{
    background:#374151;
    transform:scale(1.08);
}
.community-container{
    max-width:900px;
    margin:auto;
    padding:0 20px 60px;
}
.movie-hero{
    position:relative;
    min-height:100vh;
    overflow:hidden;
    background:#0b0f19;

    padding-top:120px;
}

</style>


@extends('layouts.app')
@section('content')
<section class="movie-hero">
    <div class="community-container">

        @foreach($reviews as $review)
            <div class="review-card">

                <div class="review-movie">
                    <img src="{{ $review->movie->poster }}" alt="">
                    <br><br>
                    <!-- <p class="movie-name">
                        {{ $review->movie->title }}
                    </p> -->

                </div>
                

                <div class="review-content">

                    <h4 class="review-user">
                        {{ $review->user->name ?? 'Unknown User' }}
                    </h4>

                    <p class="review-stars">
                        @php $stars = round($review->rating / 2); @endphp

                        @for ($i = 1; $i <= 5; $i++)
                            {{ $i <= $stars ? '★' : '☆' }}
                        @endfor
                    </p>

                    <p class="review-text">
                        {{ $review->review_text }}
                    </p>

                    <div class="review-bottom">

                        <span class="review-date">
                            {{ \Carbon\Carbon::parse($review->created_at)->diffForHumans() }}
                        </span>

                        <div class="review-actions">
                            <button class="like-btn">👍</button>
                            <button class="dislike-btn">👎</button>
                        </div>

                    </div>

                </div>

            </div>
        @endforeach
    </div>
</section>
@endsection
