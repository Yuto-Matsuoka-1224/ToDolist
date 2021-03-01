<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /* ダミーデータの作成 */

    public function run()
    {
        \DB::table('users')->insert([
            [
                'name' => 'admin',
                'password' => \Hash::make('123456789'),
                'role' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],[
                'name' => 'yamada',
                'password' => \Hash::make('123456789'),
                'role' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ],[
                'name' => 'tanaka',
                'password' => \Hash::make('123456789'),
                'role' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
