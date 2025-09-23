<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogLevel extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function logs()
    {
        return $this->hasMany(Log::class);
    }
}