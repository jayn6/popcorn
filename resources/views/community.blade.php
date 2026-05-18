@extends('layouts.app')

@section('content')

<style>

/* =========================
   COMMUNITY PAGE
========================= */

.community-container{
    max-width:1000px;
    margin:140px auto 40px;
    padding:0 20px;
}

.movie-hero{
    min-height:100vh;
    background:#0b0f19;
    padding-top:40px;
}

.review-card{
    background:#111827;
    border-radius:14px;
    padding:20px;
    margin-bottom:20px;

    display:flex;
    gap:20px;

    border:1px solid #1f2937;

    position:relative;
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

    display:flex;
    align-items:center;
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

/* =========================
   PROFILE POPUP
========================= */

.profileOverlay{
    display:none;

    position:fixed;
    inset:0;

    background:rgba(0,0,0,0.75);

    z-index:9998;
}

.profilePanel{
    display:none;

    position:fixed;

    top:50%;
    left:50%;

    transform:translate(-50%,-50%);

    width:850px;
    max-width:95%;

    max-height:90vh;

    overflow-y:auto;

    background:#14181c;

    border-radius:20px;

    padding:30px;

    z-index:9999;

    box-shadow:0 0 40px rgba(0,0,0,0.6);

    color:white;
}

.profile-top{
    display:flex;
    align-items:center;
    gap:20px;
    margin-bottom:35px;
}

.profile-avatar{
    width:110px;
    height:110px;
    border-radius:50%;
    object-fit:cover;
    border:3px solid #2c3440;
}

.profile-info h2{
    font-size:28px;
    margin-bottom:5px;
}

.profile-info p{
    color:#9ab;
    margin-bottom:10px;
}

.follow-btn{
    background:#facc15;
    color:black;
    border:none;
    padding:10px 18px;
    border-radius:8px;
    cursor:pointer;
    font-weight:bold;
}

.unfollow-btn{
    background:#ef4444;
    color:white;
    border:none;
    padding:10px 18px;
    border-radius:8px;
    cursor:pointer;
    font-weight:bold;
}

.section{
    margin-bottom:35px;
}

.section-header{
    margin-bottom:15px;
    border-bottom:1px solid #2c3440;
    padding-bottom:10px;
}

.movie-grid{
    display:flex;
    gap:15px;
    flex-wrap:wrap;
}

.movie-poster{
    width:120px;
    height:180px;
    object-fit:cover;
    border-radius:10px;
}

.reviews{
    display:flex;
    flex-direction:column;
    gap:15px;
}

.profile-review{
    background:#1c2228;
    padding:15px;
    border-radius:12px;
}

.closeProfile{
    position:absolute;
    top:15px;
    right:15px;

    background:red;
    color:white;

    border:none;

    width:35px;
    height:35px;

    border-radius:50%;

    cursor:pointer;

    font-weight:bold;
}

.follow-stats{
    display:flex;
    gap:20px;
    margin-top:10px;
}

.follow-stats p{
    color:#facc15;
    font-weight:bold;
}

.openProfile{
    cursor:pointer;
}

</style>

<section class="movie-hero">

    <div class="community-container">

        @foreach($reviews as $review)

            <div class="review-card">

                <!-- MOVIE -->
                <div class="review-movie">

                    <img src="{{ $review->movie->poster }}" alt="">

                </div>

                <!-- CONTENT -->
                <div class="review-content">

                    <!-- USER -->
                    <h4 class="review-user">

                        <img
                            src="{{ asset('storage/' . $review->user->avatar) }}"
                            class="openProfile"
                            data-profile="profile-{{ $review->user->id_user }}"
                            style="
                                width:30px;
                                height:30px;
                                border-radius:50%;
                                margin-right:10px;
                            "
                        >

                        <span
                            class="openProfile"
                            data-profile="profile-{{ $review->user->id_user }}"
                        >
                            {{ $review->user->name }}
                        </span>

                    </h4>

                    <!-- MOVIE -->
                    <p class="movie-name">
                        {{ $review->movie->title }}
                    </p>

                    <!-- STARS -->
                    <p class="review-stars">

                        @php
                            $stars = round($review->rating / 2);
                        @endphp

                        @for ($i = 1; $i <= 5; $i++)

                            {{ $i <= $stars ? '★' : '☆' }}

                        @endfor

                    </p>

                    <!-- REVIEW -->
                    <p class="review-text">
                        {{ $review->review_text }}
                    </p>

                    <!-- BOTTOM -->
                    <div class="review-bottom">

                        <span class="review-date">
                            {{ \Carbon\Carbon::parse($review->created_at)->diffForHumans() }}
                        </span>

                        <div class="review-actions">

                            <button>👍</button>
                            <button>👎</button>

                        </div>

                    </div>

                </div>

            </div>

        @endforeach

    </div>

</section>

<!-- OVERLAY -->
<div class="profileOverlay"></div>

<!-- UNIQUE USER POPUPS -->
@foreach($reviews->unique('user.id_user') as $review)

    @php
        $user = $review->user;

        $isFollowing = auth()->user()
            ->following
            ->contains($user->id_user);
    @endphp

    <div
        class="profilePanel"
        id="profile-{{ $user->id_user }}"
    >

        <button class="closeProfile">X</button>

        <!-- TOP -->
        <div class="profile-top">

            <img
                src="{{ asset('storage/' . $user->avatar) }}"
                class="profile-avatar"
            >

            <div class="profile-info">

                <h2>
                    {{ $user->name }}
                </h2>

                <p>
                    {{ $user->email }}
                </p>

                <!-- FOLLOW COUNTS -->
                <div class="follow-stats">

                    <p>
                        Followers:
                        {{ $user->followers->count() }}
                    </p>

                    <p>
                        Following:
                        {{ $user->following->count() }}
                    </p>

                </div>

                <br>

           @if(auth()->user()->id_user != $user->id_user)
@php

    $isFollowing =
        auth()->user()
        ->following()
        ->where('following_id', $user->id_user)
        ->exists();

@endphp

    @if($isFollowing)

       <form
    action="/unfollow/{{ $user->id_user }}"
    method="POST"
>
    @csrf
    @method('DELETE')

    <button
        type="submit"
        class="unfollow-btn"
    >
        Unfollow
    </button>

</form>

    @else

        <form
            action="{{ url('/follow/' . $user->id_user) }}"
            method="POST"
        >
            @csrf

            <button
                type="submit"
                class="follow-btn"
            >
                Follow
            </button>

        </form>

    @endif

@endif

        <!-- FAVORITE MOVIES -->
        @if($user->likes->count())

            <div class="section">

                <div class="section-header">
                    <h3>Favourite Movies</h3>
                </div>

                <div class="movie-grid">

                    @foreach($user->likes as $like)

                        <img
                            class="movie-poster"
                            src="{{ $like->movie->poster }}"
                        >

                    @endforeach

                </div>

            </div>

        @endif

        <!-- REVIEWS -->
        @if($user->reviews->count())

            <div class="section">

                <div class="section-header">
                    <h3>Reviews</h3>
                </div>

                <div class="reviews">

                    @foreach($user->reviews as $userReview)

                        <div class="profile-review">

                            <h4>
                                {{ $userReview->movie->title }}
                                -
                                {{ $userReview->rating }}/10
                            </h4>

                            <p>
                                {{ $userReview->review_text }}
                            </p>

                        </div>

                    @endforeach

                </div>

            </div>

        @endif

    </div>

@endforeach

<script>

const overlay =
    document.querySelector(".profileOverlay");

const openButtons =
    document.querySelectorAll(".openProfile");

openButtons.forEach(button => {

    button.addEventListener("click", function(){

        const profileId =
            this.dataset.profile;

        const panel =
            document.getElementById(profileId);

        overlay.style.display = "block";
        panel.style.display = "block";

        document.body.style.overflow = "hidden";

    });

});

const closeButtons =
    document.querySelectorAll(".closeProfile");

closeButtons.forEach(button => {

    button.addEventListener("click", function(){

        const panel =
            this.closest(".profilePanel");

        panel.style.display = "none";

        overlay.style.display = "none";

        document.body.style.overflow = "auto";

    });

});

overlay.addEventListener("click", function(){

    document
        .querySelectorAll(".profilePanel")
        .forEach(panel => {

            panel.style.display = "none";

        });

    overlay.style.display = "none";

    document.body.style.overflow = "auto";

});

</script>

@endsection