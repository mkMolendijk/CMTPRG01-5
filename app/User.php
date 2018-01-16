<?php

namespace myGamesList;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function games()
    {
        return $this->hasMany(Game::class);
    }

    public function likes()
    {
        return $this->belongsToMany(Game::class, 'likes')->withPivot('game_id');
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'user_role')->withPivot('role_id');
    }

//    public function authorizeRoles($roles)
//    {
//        if (is_array($roles)) {
//            return $this->hasAnyRole($roles) ||
//                abort(401, 'This action is unauthorized.');
//        }
//        return $this->hasRole($roles) ||
//            abort(401, 'This action is unauthorized.');
//    }
//
//    public function hasAnyRole($roles)
//    {
//        return null !== $this->roles()->whereIn('title', $roles)->first();
//    }

    public function hasRole($role)
    {
        return null !== $this->roles()->where('title', $role)->first();
    }
}
