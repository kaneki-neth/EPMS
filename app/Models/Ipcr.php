<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ipcr extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'accomplishment_id'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function accomplishment(): BelongsTo
    {
        return $this->belongsTo(Accomplishment::class);
    }
}
