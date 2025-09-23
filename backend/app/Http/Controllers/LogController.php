<?php

namespace App\Http\Controllers;

use App\Models\Log;
use Illuminate\Http\JsonResponse;

class LogController extends Controller
{
    public function index(): JsonResponse
    {
        $logs = Log::all();

        foreach ($logs as $log) {
            $log->logLevel;
        }

        return response()->json($logs);
    }
}