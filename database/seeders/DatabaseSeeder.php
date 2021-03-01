<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    
    /* ダミーデータの実行 */

    public function run()
    {
        $this->call(TaskdemoSeeder::class);
        $this->call(TaskSeeder::class);
        $this->call(UserSeeder::class);

    }
}
