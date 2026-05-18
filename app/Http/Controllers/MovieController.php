<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;

use Illuminate\Http\Request;
use App\Models\Movie;

use Illuminate\Support\Facades\Auth;
use App\Models\Like;

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
            'imdb_id' => $movie['imdbID'], 



        ]);

        return redirect('/');

    }
    public function index(){
            $movies = Movie::all();

    return view('list', compact('movies'));
    }
   
     public function update(Request $request, $id){
        $movie = Movie::findOrFail($id);

        $movie->title = $request->title;
        $movie->description = $request->description;
        $movie->genre = $request->genre;
        $movie->rate = $request->rate;
        $movie->type = $request->type;

        $movie->save();

        return redirect('/');
    }
    
    public function destroy($id){
        $movie = Movie::findOrFail($id);

        $movie->delete();

        return redirect('/');
    }

    public function like($movieId)
    {
        $userId = Auth::id();

        $like = Like::where('user_id', $userId)
                    ->where('movie_id', $movieId)
                    ->first();
        if (!$like) {
            Like::create([
                'user_id' => $userId,
                'movie_id' => $movieId
            ]);
        } 
        return back();
    }
   
}
