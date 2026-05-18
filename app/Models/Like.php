<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{   
    public $timestamps = false;
    protected $table = 'likes';

    protected $fillable = [
        'user_id',
        'movie_id'
    ];

    public function movie()
    {
        return $this->belongsTo(Movie::class, 'movie_id');
    }
}
    
