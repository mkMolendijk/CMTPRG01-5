<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $fillable = array('title', 'game_id');

    public function game() {
        return $this->belongsTo('Game');
    }
}
