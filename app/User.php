<?php

namespace App;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User  extends Authenticatable implements JWTSubject
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'phone', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
 

    public function posts()
    {
        return $this->hasMany(Post::class)->orderBy('id', 'DESC');
    }

    //roles

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    /**
     * @param string|array $roles
     */
    public function authorizeRoles($roles)
    {
        if (is_array($roles)) {
            return $this->hasAnyRole($roles) ||
                abort(401, 'This action is unauthorized.');
        }
        return $this->hasRole($roles) ||
            abort(401, 'This action is unauthorized.');
    }
    /**
     * Check multiple roles
     * @param array $roles
     */
    public function hasAnyRole($roles)
    {
        return null !== $this->roles()->whereIn('name', $roles)->first();
    }
    /**
     * Check one role
     * @param string $role
     */
    public function hasRole($role)
    {
        return null !== $this->roles()->where('name', $role)->first();
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }


    public function followers()
    {
        return $this->belongsToMany(User::class, 'followers', 'leader_id', 'follower_id')->withTimestamps();
    }


    public function followings()
    {
        return $this->belongsToMany(User::class, 'followers', 'follower_id', 'leader_id')->withTimestamps();
    }
}
