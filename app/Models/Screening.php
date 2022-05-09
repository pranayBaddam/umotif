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
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'dob',
        'headache_frequency_type',
        'daily_frequency_headache',
        'assigned_to'
    ];

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
