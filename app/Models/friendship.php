<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class friendship extends Model
{
    use HasFactory;

    protected $table = 'friendships';

    protected $fillable = [
        'user_id',
        'friend_user_id',
        'status',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    
    public function friendUser(){
        return $this->belongsTo(User::class, 'friend_user_id', 'id');
    }

}
