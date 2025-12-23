<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $fillable = [
        'model',
        'event',
        'old',
        'new'
    ];

    protected $casts = [
        'old' => 'array',
        'new' => 'array'
    ];
}
