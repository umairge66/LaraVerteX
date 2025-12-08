<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServerMetric extends Model
{
    protected $guarded =  [];

    public $timestamps = false;

    protected $casts = [
        'data' => 'array',
    ];
}
