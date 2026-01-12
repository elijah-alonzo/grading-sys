<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Faculty extends Model
{
    protected $fillable = [
        'name',
        'employment_type',
        'department_id',
        'email',
        'phone',
    ];

    protected $casts = [
        'employment_type' => 'string',
    ];

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }
}
