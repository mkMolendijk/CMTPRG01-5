<?php

namespace myGamesList;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $fillable = array('title', 'image', 'genre_id', 'rating', 'description');

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function genre() {
        return $this->belongsTo(Genre::class);
    }

    public function hasLikes() {
        return $this->hasMany(User::class);
    }
}
