<?php
namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Watchlist;
use Illuminate\Support\Facades\Auth;

class WatchlistController extends Controller{
    public function add($movieId){
        $userId = Auth::id();

        $exists = Watchlist::where('user_id', $userId)
            ->where('movie_id', $movieId)
            ->first();

        if (!$exists) {
            Watchlist::create([
                'user_id' => $userId,
                'movie_id' => $movieId
            ]);
        }

        return back();
    }

    public function index(){
        $watchlist = Watchlist::with('movie')
        ->where('user_id', Auth::id())
        ->get();

        return view('watchlist', compact('watchlist'));
    }
}