<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Department extends Model
{
    protected $fillable = [
        'name',
    ];

    public function faculties(): HasMany
    {
        return $this->hasMany(Faculty::class);
    }

    public function sections(): HasMany
    {
        return $this->hasMany(Section::class);
    }
}
