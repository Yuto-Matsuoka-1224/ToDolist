<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    /* カラムの可変項目一覧 */

    protected $fillable = [
        'title', 
        'predicttime_hours',
        'predicttime_minutes',
        'realtime_hours',
        'realtime_minutes',
        'complete',
        'RATE'
    ];

    /* taskテーブル → userテーブルへの紐付け */

    public function user()
    { 
        return $this->belongsTo(User::class);  // 多対1の紐付け
    }

    /* 保存時user_idをログインユーザーに設定 */
    
    protected static function boot()
    {
    parent::boot();
    self::saving(function($task) {
        $task->user_id = \Auth::id();
    });
    } 
}
