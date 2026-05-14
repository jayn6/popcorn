<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Review extends Model{
    protected $table = 'reviews';
    protected $primaryKey = 'id_review';
    public $timestamps = false;

    protected $fillable = [
        'review_text',
        'rating',
        'id_user',
        'id_movie'
    ];


    public function user(){
        return $this->belongsTo(User::class, 'id_user');
    }

    public function movie(){
        return $this->belongsTo(Movie::class, 'id_movie');
    }
}