<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Taskdemo extends Model
{
    use HasFactory;

    /* カラムの可変項目一覧 */

    protected $fillable = [
        'complete',
        'title', 
        'predicttime_hours',
        'predicttime_minutes',
        'realtime_hours',
        'realtime_minutes',
    ];
    
}
