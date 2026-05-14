<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'review_text' => 'required',
            'rating' => 'required|integer|min:1|max:10',
            'id_movie' => 'required',
        ]);

        Review::create([
            'review_text' => $request->review_text,
            'rating' => $request->rating,
            'id_user' => auth()->user()->id_user,
            'id_movie' => $request->id_movie,
        ]);

        return redirect()->back()->with('success', 'Review added successfully!');
    }

    public function community()
    {
        $reviews = Review::with('user', 'movie')->latest()->get();
        return view('community', compact('reviews'));
    }
}
