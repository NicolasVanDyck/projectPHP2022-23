<?php

namespace Database\Seeders;

use App\Models\Size;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /**
         * Creates the sizes from the factory model.
         * The amount of sizes is defined in the factory model and should not be changed here.
         * @var Size $size
         */
        Size::factory(5)->create();
    }
}
