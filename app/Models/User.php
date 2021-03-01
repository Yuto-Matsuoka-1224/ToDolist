<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /* カラムの可変項目一覧 */

    protected $fillable = [
        'name', 
        'password',
        'role'
    ];

    /* userテーブル → taskテーブルへの紐付け */

    public function tasks()
    {
        return $this->hasMany(Task::class); // 1対多の紐付け
    }

    
}
