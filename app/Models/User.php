<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $table = 'users';
    protected $fillable = [
        'name',
        'email',
        'password',
        'image',
        'intersts',
        'career',
        'phone',
        'age',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function post()
    {
        return $this->hasMany(post::class, 'user_id', 'id');
    }


    public function ask()
    {
        return $this->hasMany(ask::class, 'user_id', 'id');
    }

    public function report()
    {
        return $this->hasMany(report::class, 'user_id', 'id');
    }

    public function story()
    {
        return $this->hasMany(story::class, 'user_id', 'id');
    }

    public function friend()
    {
        return $this->hasMany(friendship::class,'user_id' ,'id');
    }
    public function friendshipsAsFriend(){
        return $this->hasMany(Friendship::class, 'friend_user_id', 'id');
    }





 /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
      return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
      return [];
    }




}
