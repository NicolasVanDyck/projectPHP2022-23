<?php

namespace Database\Seeders;

use App\Models\GroupTour;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GroupTourSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        GroupTour::factory(5)->create([
            'start_date' => '2023-06-05',
        ]);
    }
}
