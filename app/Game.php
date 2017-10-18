<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $fillable = array('title', 'image', 'genre_id', 'rating', 'description');

    public function user() {
        return $this->belongsTo('User');
    }

    public function genres() {
        return $this->hasMany('Genre');
    }

}
