<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\LogLevel;

class LogLevelSeeder extends Seeder
{
    public function run(): void
    {
        $levels = ['INFO', 'WARNING', 'ERROR', 'DEBUG'];
        foreach ($levels as $level) {
            LogLevel::firstOrCreate(['name' => $level]);
        }
    }
}