<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LogController;

Route::get('/healthcheck', [LogController::class, 'healthcheck']);

Route::get('/logs', [LogController::class, 'index']);
