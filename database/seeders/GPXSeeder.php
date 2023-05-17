<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\GPX;

class GPXSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        GPX::factory(3)->create();
    }
}
