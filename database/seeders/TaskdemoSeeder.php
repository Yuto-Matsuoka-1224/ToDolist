<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Taskdemo;

class TaskdemoSeeder extends Seeder
{
    /* ダミーデータの作成 */
    
    public function run()
    {
        Taskdemo::factory()->count(10)->create();
    }
}
