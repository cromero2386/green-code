<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Log;
use App\Models\LogLevel;
use Illuminate\Support\Str;

class LogSeeder extends Seeder
{
    public function run(): void
    {
        $levelIds = LogLevel::pluck('id')->toArray();

        for ($i = 0; $i < 5000; $i++) {
            Log::create([
                'message' => Str::random(40),
                'log_level_id' => $levelIds[array_rand($levelIds)],
                'created_at' => now()->subMinutes(rand(0, 100000))
            ]);
        }
    }
}