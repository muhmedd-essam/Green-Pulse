<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comment_report extends Model
{
    use HasFactory;

    protected $table = 'comment_reports';

    protected $fillable = [
        'description',
        'report_id',
    ];

    public function report(){
        return $this->belongsTo(report::class, 'report_id', 'id');
    }
}
