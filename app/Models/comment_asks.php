<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comment_asks extends Model
{
    use HasFactory;

    protected $table = 'comment_asks';

    protected $fillable = [
        'image',
        'description',
        'ask_id',
    ];

    public function ask(){
        return $this->belongsTo(ask::class, 'ask_id', 'id');
    }
}
