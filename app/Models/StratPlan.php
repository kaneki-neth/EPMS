<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StratPlan extends Model
{
    use HasFactory;

    protected $fillable = [
        'key_function_id',
        'sector_id',
        'task_id',
        'performance_measure_id',
        'goal',
    ];

    public function key_function(): BelongsTo
    {
        return $this->belongsTo(KeyFunction::class);
    }

    public function sector(): BelongsTo
    {
        return $this->belongsTo(Sector::class);
    }

    public function task(): BelongsTo
    {
        return $this->belongsTo(Sector::class);
    }

    public function performance_measure(): BelongsTo
    {
        return $this->belongsTo(PerformanceMeasure::class);
    }
}
