<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class map extends Model
{
    use HasFactory;

    protected $table = 'maps';
    protected $fillable = [
        'year',
        'code',
    ];

    public function getCreatedAtAttribute($value){
        return Carbon::parse($value)->format('d F \a\t H:i');
        }

        public function getUpdatedAtAttribute($value){
            return Carbon::parse($value)->format('d F \a\t H:i');
        }

}
