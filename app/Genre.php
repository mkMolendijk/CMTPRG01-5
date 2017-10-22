<?php

namespace myGamesList;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $fillable = array('title');

    public function game() {
        return $this->belongsTo('Game');
    }
}
