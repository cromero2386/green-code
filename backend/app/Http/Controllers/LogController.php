<?php

namespace App\Http\Controllers;

use App\Models\Log;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class LogController extends Controller
{    
    public function apiResponse($code, $message, $data = []){
        return response()->json([
            'code' => $code,
            'message' => $message,            
            'data' => $data
        ], $code);
    }

    public function healthcheck(){
        return $this->apiResponse(200, 'API funcionando correctamente');
    }

    public function index(Request $request): JsonResponse
    {           
        $query = $request->input('query');
        $level = $request->input('level');
        $paginate = $request->input('paginate');
                        
        $logs = Log::whereHas('logLevel',function ($q) use ($level) {
                $q->when($level, function ($q) use ($level) {
                    $q->whereLike('name', '%'.$level.'%');
                });
            })
            ->when($query, function ($q) use ($query) {
                $q->whereLike('message', '%'.$query.'%');
            })            
            ->with('logLevel')
            ->paginate($paginate);
        
        return $this->apiResponse(200, 'success', $logs);
    }
}