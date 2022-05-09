<?php

namespace Database\Seeders;

use App\Models\Screening;
use Database\Factories\ScreeningFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ScreeningSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Screening::factory(30)->DailyFrequencyType()->create();
        Screening::factory(30)->OtherFrequencyTypes()->create();

    }
}
