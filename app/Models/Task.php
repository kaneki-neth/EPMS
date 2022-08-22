<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'owner_id',
        'colaborator_id',
        'objectives',
        'strategies',
        'specific_action',
        'success_indicator',
        'duration',
        'budget'
    ];

    public function owner(): BelongsTo
    {
        return $this->belongsTo(OfficeMember::class);
    }

    public function colaborator(): BelongsTo
    {
        return $this->belongsTo(OfficeMember::class);
    }
}
