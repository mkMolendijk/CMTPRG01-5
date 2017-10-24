<?php

namespace myGamesList;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use Searchable;

    protected $fillable = array('title', 'image', 'genre_id', 'rating', 'description');

    public function user() {
        return $this->belongsTo('User');
    }

    public function genres() {
        return $this->hasMany('Genre');
    }

}
