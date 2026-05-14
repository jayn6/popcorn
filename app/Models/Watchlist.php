<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Watchlist extends Model
{
     public $timestamps = false;

    protected $fillable = [
        'user_id',
        'movie_id'
    ];
    
     protected $primaryKey = 'id_watchlist';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }
}
