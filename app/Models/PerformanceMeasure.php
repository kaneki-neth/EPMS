<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerformanceMeasure extends Model
{
    use HasFactory;

    protected $fillable = [
        'year',
        'nominal_target'
    ];
}
