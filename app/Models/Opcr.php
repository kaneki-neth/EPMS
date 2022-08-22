<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Opcr extends Model
{
    use HasFactory;

    protected $fillable = [
        'accomplishment_id',
        'office_member_id'
    ];

    public function accomplishment(): BelongsTo
    {
        return $this->belongsTo(Accomplishment::class);
    }

    public function office_member(): BelongsTo
    {
        return $this->belongsTo(OfficeMember::class);
    }
}
