<?php

namespace myGamesList;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $fillable = array('title', 'image', 'genre_id', 'description');

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function genre() {
        return $this->belongsTo(Genre::class);
    }

    public function likedBy() {
        return $this->belongsToMany(User::class, 'likes')->withPivot('user_id');
    }
}
