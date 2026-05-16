<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;

class HomeController extends Controller
{
    //
public function index(){
  $trending = Movie::where('type', 'trending')->take(8)->get();

    $topRated = Movie::where('type', 'top_rated')->take(8)->get();

    $upcoming = Movie::where('type', 'upcoming')->take(8)->get();    
        $series = Movie::where('type', 'series')->take(8)->get();    

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
        'avatar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
    ]);

    // UPDATE NAME + EMAIL
    $user->name = $request->name;
    $user->email = $request->email;

    // UPDATE AVATAR
    if ($request->hasFile('avatar')) {

        $file = $request->file('avatar');

        $filename = time() . '.' . $file->getClientOriginalExtension();

        // save in storage/app/public/avatars
        $file->storeAs('public/avatars', $filename);

        // save path in DB
        $user->avatar = 'avatars/' . $filename;
    }

    $user->save();

    return redirect()->route('home')
                     ->with('success', 'Profile updated!');
}
}
