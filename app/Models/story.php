<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class story extends Model
{
    use HasFactory;
    protected $table = 'story';

    protected $fillable = [

        'image',
        'user_id',

    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

}
