<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Log;
use App\Models\LogLevel;

class LogSeeder extends Seeder
{
    const LOG_LEVELS = [
        'CRITICAL',
        'ERROR',
        'WARNING',
        'INFO',
        'DEBUG'
    ];

    public function run()
    {
        // Si no hay niveles, los creo
        if (LogLevel::count() === 0) {
            LogLevel::insert(array_map(
                fn($level) => ['name' => $level],
                self::LOG_LEVELS
            ));
        }

        if (file_exists(base_path('database/seeders/data/logs.csv'))) {
            $logLevels = LogLevel::all()->pluck('name', 'id')->flip()->toArray();
            $defaultLogLevelId = key($logLevels);

            $csvFile = fopen(base_path('database/seeders/data/logs.csv'), 'r');
            fgetcsv($csvFile, 200, ','); // Descarto los encabezados

            while (($data = fgetcsv($csvFile, 200, ',')) !== false) {
                Log::create([
                    'timestamp' => $data[0],
                    'log_level_id' => $logLevels[$data[1]] ?? $defaultLogLevelId,
                    'source' => $data[2],
                    'message' => $data[3],
                    'request_id' => $data[4],
                    'user_id' => $data[5]
                ]);
            }

            fclose($csvFile);
        } else {
            $logLevels = LogLevel::all()->pluck('name', 'id')->toArray();

            for ($i = 0; $i < 5000; $i++) {
                Log::create([
                    'timestamp' => now(),
                    'log_level_id' => array_rand($logLevels),
                    'source' => 'system',
                    'message' => 'Log message ' . $i,
                    'request_id' => null,
                    'user_id' => null
                ]);
            }
        }
    }
}