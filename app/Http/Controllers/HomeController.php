<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Like;

class HomeController extends Controller
{
    //
public function index(){
    $trending = Movie::where('type', 'trending')->get();

    $topRated = Movie::where('type', 'top_rated')->get();

    $upcoming = Movie::where('type', 'upcoming')->get();    
    $series = Movie::where('type', 'series')->get(); 
       

    return view('home', compact('trending', 'topRated', 'upcoming', 'series'));
    }

    public function edit()
{
    return view('edit');
}
public function update(Request $request)
{
    $user = auth()->user();

    // VALIDATION
    $request->validate([
        'name' => 'required|max:255',
        'email' => 'required|email|max:255',
        'avatar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'
    ]);

    // UPDATE NAME + EMAIL
    $user->name = $request->name;
    $user->email = $request->email;

    // UPDATE AVATAR
    if ($request->hasFile('avatar')) {

        $file = $request->file('avatar');

        $filename = $file->getClientOriginalName();

        // save in storage/app/public
        $file->storeAs($filename);

        // save path in DB
        $user->avatar = $filename;
    }

    $user->save();

    return redirect()->route('home')
                     ->with('success', 'Profile updated!');
    }

    public function showProfile($id)
    {
        $user = User::with('reviews.movie')->findOrFail($id);

        return view('profile', compact('user'));
    }


}
