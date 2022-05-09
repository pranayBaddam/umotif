<?php

namespace Database\Factories;

use App\Enum\AssignedTo;
use App\Enum\HeadacheDailyFrequencyType;
use App\Enum\HeadacheFrequencyType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory
 */
class ScreeningFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'dob' => $this->faker->date(),
            'headache_frequency_type' => $this->faker->randomElement(HeadacheFrequencyType::cases()),
            'assigned_to' => $this->faker->randomElement(AssignedTo::cases()),
        ];
    }

    public function DailyFrequencyType(): ScreeningFactory
    {
        return $this->state(function (array $attributes) {
            return [
                'headache_frequency_type' => HeadacheFrequencyType::daily,
                'daily_frequency_headache' => $this->faker->randomElement(HeadacheDailyFrequencyType::cases()),
                'assigned_to' => AssignedTo::cohortB,
            ];
        });
    }

    public function OtherFrequencyTypes(): ScreeningFactory
    {
        return $this->state(function (array $attributes) {
            return [
                'headache_frequency_type' => $this->faker->randomElement([HeadacheFrequencyType::monthly, HeadacheFrequencyType::weekly]),
                'daily_frequency_headache' => $this->faker->randomElement([NULL]),
                'assigned_to' => AssignedTo::cohortA,
            ];
        });
    }
}
