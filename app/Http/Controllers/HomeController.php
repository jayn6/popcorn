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
    return view('home', compact('trending', 'topRated', 'upcoming'));
    }
}
