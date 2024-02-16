<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    use HasFactory;
    protected $table = 'comments';

    protected $fillable = [
        'image',
        'description',
        'post_id',
    ];

    public function post(){
        return $this->belongsTo(post::class, 'post_id', 'id');
    }
}
