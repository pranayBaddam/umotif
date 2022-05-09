<?php

namespace App\Enum;

enum HeadacheFrequencyType: int
{
    case monthly = 1;
    case weekly = 2;
    case daily = 3;

    public function label(): string
    {
        return match ($this)
        {
            self::monthly => 'Monthly',
            self::weekly => 'Weekly',
            self::daily => 'Daily'
        };
    }
}
