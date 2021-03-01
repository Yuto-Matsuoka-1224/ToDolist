<?php

namespace Database\Factories;

use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    
    /* テーブル呼び出し */

    protected $model = Task::class;

    /* ダミーデータの作成条件 */

    public function definition()
    {
        return [
            'title' => $this->faker->realText(rand(10,30)),
            'predicttime_hours' => $this->faker->numberBetween(0,23),
            'predicttime_minites' => $this->faker->numberBetween(0,59),
            'realtime_hours' => $this->faker->numberBetween(0,23),
            'realtime_minutes' => $this->faker->numberBetween(0,59),
            'user_id' => $this->faker->numberBetween(1,3),
        ];
    }
}
