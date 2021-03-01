<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Task;

class TaskSeeder extends Seeder
{
    
    /* ダミーデータの作成 */

    public function run()
    {
        \Event::fakeFor(function () {
            Task::factory()->count(40)->create();
        });
    }
}
