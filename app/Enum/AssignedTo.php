<?php

namespace App\Enum;

enum AssignedTo: int
{
    case cohortA = 1;
    case cohortB = 2;

    public function label(): string
    {
        return match ($this)
        {
            self::cohortA => 'Cohort A',
            self::cohortB => 'Cohort B',
        };
    }
}
