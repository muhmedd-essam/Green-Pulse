<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ask extends Model
{
    use HasFactory;
    protected $table = 'asks';

    protected $fillable = [
        'image',
        'description',
        'user_id',
        'up',
        'who_will_answer',
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
        return $this->hasMany(comment_asks::class, 'ask_id', 'id');
    }
}
