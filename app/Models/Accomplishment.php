<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Accomplishment extends Model
{
    use HasFactory;

    protected $fillable = [
        'task_id',
        'quarter_id',
        'rate_id',
        'target',
        'actual_accomplishment',
        'remarks',
    ];

    public function task(): BelongsTo
    {
        return $this->belongsTo(Task::class);
    }
    public function quarter(): BelongsTo
    {
        return $this->belongsTo(Quarter::class);
    }
    public function rate(): BelongsTo
    {
        return $this->belongsTo(Rating::class);
    }
}
