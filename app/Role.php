<?php

namespace myGamesList;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['title'];

    public function user() {
        return $this->belongsToMany(User::class, 'user_role')->withPivot('user_id');
    }
}
