@extends('layouts.app')

@section('content')
<section class="auth-page">
    <div class="auth-card">
        <h1>Create Account</h1>
        <p>Join Popcorn and start tracking your favorite films.</p>

        <form method="POST" action="{{ route('register') }}" class="auth-form">
            @csrf

            <label for="name">Name</label>
            <input id="name" type="text" name="name" value="{{ old('name') }}" placeholder="Your full name" required>

            <label for="email">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" placeholder="you@example.com" required>

            <label for="password">Password</label>
            <input id="password" type="password" name="password" placeholder="At least 6 characters" required>

            <label for="password_confirmation">Confirm Password</label>
            <input id="password_confirmation" type="password" name="password_confirmation" placeholder="Repeat your password" required>

            @if ($errors->any())
                <div class="auth-error">{{ $errors->first() }}</div>
            @endif

            <button type="submit" class="auth-submit">Create Account</button>
        </form>

        <a href="{{ route('login') }}" class="auth-link">Already have an account? Login</a>
    </div>
</section>

<style>
    .auth-page {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 110px 20px 40px;
    }
    .auth-card {
        width: 100%;
        max-width: 460px;
        background: #14141c;
        border: 1px solid rgba(250, 204, 21, 0.14);
        border-radius: 18px;
        padding: 34px;
        box-shadow: 0 20px 50px rgba(0, 0, 0, 0.45);
    }
    .auth-card h1 {
        font-family: 'Bebas Neue', sans-serif;
        letter-spacing: 0.03em;
        font-size: 2.2rem;
        color: #fff;
    }
    .auth-card p {
        color: #9ca3af;
        margin: 4px 0 20px;
    }
    .auth-form {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }
    .auth-form label {
        color: #e5e7eb;
        font-size: 0.85rem;
    }
    .auth-form input {
        background: #0f0f14;
        border: 1px solid rgba(255, 255, 255, 0.08);
        color: #fff;
        border-radius: 10px;
        padding: 12px;
        outline: none;
    }
    .auth-form input:focus {
        border-color: #facc15;
        box-shadow: 0 0 14px rgba(250, 204, 21, 0.2);
    }
    .auth-error {
        background: rgba(239, 68, 68, 0.12);
        border: 1px solid rgba(239, 68, 68, 0.5);
        color: #fca5a5;
        border-radius: 10px;
        padding: 10px;
        font-size: 0.85rem;
    }
    .auth-submit {
        margin-top: 8px;
        border: none;
        border-radius: 12px;
        padding: 12px;
        font-weight: 700;
        cursor: pointer;
        background: linear-gradient(135deg, #facc15, #f97316);
        color: #0b0b0f;
    }
    .auth-link {
        margin-top: 16px;
        display: inline-block;
        color: #facc15;
        text-decoration: none;
        font-size: 0.88rem;
    }
</style>
@endsection