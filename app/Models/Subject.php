<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    public function loads(): HasMany
    {
        return $this->hasMany(Load::class);
    }
}
