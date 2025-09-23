<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\LogLevel;

class LogFactory extends Factory
{
    public function definition(): array
    {
        return [
            'message' => $this->faker->sentence,
            'log_level_id' => LogLevel::inRandomOrder()->first()->id ?? 1,
            'created_at' => $this->faker->dateTimeBetween('-3 months'),
        ];
    }
}