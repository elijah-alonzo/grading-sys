<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = [
        'name',
        'units',
        'type',
        'description',
    ];

    protected $casts = [
        'type' => 'string',
    ];
}
