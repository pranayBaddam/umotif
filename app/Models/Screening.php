<?php

namespace App\Models;

use App\Enum\AssignedTo;
use App\Enum\HeadacheDailyFrequencyType;
use App\Enum\HeadacheFrequencyType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Screening extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'dob' => 'date',
        'assigned_to' => AssignedTo::class,
        'headache_frequency_type' => HeadacheFrequencyType::class,
        'daily_frequency_headache' => HeadacheDailyFrequencyType::class,
    ];
}
