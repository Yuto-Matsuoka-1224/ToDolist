<?php

namespace Database\Factories;

use App\Models\Taskdemo;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskdemoFactory extends Factory
{
    /* テーブル呼び出し */

    protected $model = Taskdemo::class;

    /* ダミーデータの作成条件 */

    public function definition()
    {
        return [
            'title' => $this->faker->realText(rand(10,30)),
            'predicttime_hours' => $this->faker->numberBetween(0,23),
            'predicttime_minutes' => $this->faker->numberBetween(0,59),
            'realtime_hours' => $this->faker->numberBetween(0,23),
            'realtime_minutes' => $this->faker->numberBetween(0,59),
        ];
    }
}
