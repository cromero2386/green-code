<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Log;
use App\Models\LogLevel;

class LogSeeder extends Seeder
{
    public function run()
    {
        // Si no hay niveles, crea algunos
        if (LogLevel::count() === 0) {
            LogLevel::insert([
                ['name' => 'info'],
                ['name' => 'warning'],
                ['name' => 'error'],
            ]);
        }

        $logLevels = LogLevel::all();

        for ($i = 0; $i < 5000; $i++) {
            Log::create([
                'message' => 'Log message ' . $i,
                'log_level_id' => $logLevels->random()->id,
            ]);
        }
    }
}