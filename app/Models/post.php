<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    use HasFactory;

    protected $table = 'posts';
    protected $fillable = [
        'image',
        'description',
        'user_id',
        'up',
    ];
    public function getCreatedAtAttribute($value){
    return Carbon::parse($value)->format('d F \a\t H:i');
    }

    public function getUpdatedAtAttribute($value){
        return Carbon::parse($value)->format('d F \a\t H:i');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function comment()
    {
        return $this->hasMany(comment::class, 'post_id', 'id');
    }
}
