<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OfficeMember extends Model
{
    use HasFactory;

    protected $fillable = [
        'office_id',
        'member_id'
    ];

    public function office(): BelongsTo
    {
        return $this->belongsTo(Office::class);
    }

    public function member(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
