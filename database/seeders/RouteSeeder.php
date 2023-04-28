<?php

namespace Database\Seeders;

use App\Models\BicycleType;
use App\Models\Route;
use App\Models\Tour;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RouteSeeder extends Seeder
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
        $routes = Route::factory(100)->create();

        foreach ($routes as $route) {
            $bicycleTypes = BicycleType::inRandomOrder()->take($randombicycleType)->pluck('id');
            $route->bicyleTypes()->syncWithoutDetaching($bicycleTypes);
        }
    }
}
