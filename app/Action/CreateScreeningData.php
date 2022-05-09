<?php

namespace App\Action;

use App\Enum\AssignedTo;
use App\Enum\HeadacheFrequencyType;
use App\Models\Screening;

class CreateScreeningData
{
    public function execute(array $data): Screening
    {
        $frequencyType = $data['headache_frequency_type'];

        $screening = new Screening();
        $screening->first_name = $data['first_name'];
        $screening->dob = $data['dob'];
        $screening->headache_frequency_type = $frequencyType;

        if($frequencyType == HeadacheFrequencyType::daily->value)
        {
            $screening->assigned_to = $this->checkAge($screening->dob?->age) ? AssignedTo::cohortB : NULL;
            $screening->daily_frequency_headache = $data['daily_headache_frequency'];
        }
        else
        {
            $screening->assigned_to = $this->checkAge($screening->dob?->age) ? AssignedTo::cohortA : NULL;
        }
        $screening->save();

        return $screening;
    }

    private function checkAge(int $age): bool
    {
        return $age >= 18;
    }
}
