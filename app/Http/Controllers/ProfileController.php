<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;

class ProfileController extends Controller
{
    
use App\Models\User;

public function show($id)
{
    $user = User::with([
        'likes.movie',
        'reviews.movie',
        'followers',
        'following'
    ])->findOrFail($id);

    return view('profile', compact('user'));
}

}