<?php

namespace Database\Seeders;

use App\Models\BicycleType;
use App\Models\Tour;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TourSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bicycleTypes = ['Koers', 'MTB'];
        $randombicycleType = rand(1,count($bicycleTypes));

        foreach ($bicycleTypes as $bicycleType)
        {
            BicycleType::firstOrCreate(['bicycleType' => $bicycleType]);
        }
        $tours = Tour::factory(100)->create();

        foreach ($tours as $tour)
        {
            $bicycleTypes = BicycleType::inRandomOrder()->take($randombicycleType)->pluck('id');
            $tour->bikes()->syncWithoutDetaching($bicycleTypes);
        }
    }
}
