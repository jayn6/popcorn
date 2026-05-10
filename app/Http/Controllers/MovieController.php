<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;

use Illuminate\Http\Request;
use App\Models\Movie;

class MovieController extends Controller
{
    public function show ($id) {
        $movie = Movie::findOrFail($id);
        return view('movie', compact('movie'));
    }

    public function create() {
        return view('admin.create');
    }

    public function store(Request $request)
    {

        $movieName = $request->movie_name;

        $apiKey = env('OMDB_API_KEY');

        $response = Http::get(
            'http://www.omdbapi.com/',
            [
                'apikey' => $apiKey,
                't' => $movieName
            ]
        );

        $movie = $response->json();

        Movie::create([

            'title' => $movie['Title'],

            'description' => $movie['Plot'],

            'poster' => $movie['Poster'],

            'genre' => $movie['Genre'],

            'year' => $movie['Year'],

            'rate' => $movie['imdbRating'],
            'actors' => $movie['Actors'],



        ]);

        return redirect('/');

    }

}
