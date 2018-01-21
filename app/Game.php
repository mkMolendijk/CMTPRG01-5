<?php

namespace myGamesList;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
<<<<<<< HEAD
//    use Searchable;

    protected $fillable = array('title', 'image', 'genre_id', 'rating', 'description');
=======
    protected $fillable = array('title', 'image', 'genre_id', 'description');
>>>>>>> dev

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
