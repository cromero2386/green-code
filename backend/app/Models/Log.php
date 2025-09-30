<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;

    protected $fillable = [
        'timestamp',
        'log_level_id',
        'source',
        'message',
        'request_id',
        'user_id',
    ];

    public function logLevel()
    {
        return $this->belongsTo(LogLevel::class);
    }
}