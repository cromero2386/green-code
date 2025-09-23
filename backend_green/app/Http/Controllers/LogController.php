<?php

namespace App\Http\Controllers;

use App\Models\Log;
use Illuminate\Http\Request;

class LogController extends Controller
{
    public function index()
    {
        $logs = Log::with('logLevel')->orderByDesc('created_at')->get();
        return response()->json($logs);
    }
}