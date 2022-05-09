<?php

namespace App\Enum;

enum HeadacheDailyFrequencyType: int
{
    case one_two = 1;
    case three_four = 2;
    case five_plus = 3;

    public function label(): string
    {
        return match ($this)
        {
            self::one_two => '1-2',
            self::three_four => '3-4',
            self::five_plus => '5+'
        };
    }
}
