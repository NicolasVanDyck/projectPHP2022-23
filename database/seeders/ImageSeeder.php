<?php

namespace Database\Seeders;

use App\Models\Image;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Image::factory(10)->create();

        Image::factory(1)->create([
            'name' => 'Dancing cat',
            'description' => 'Here we can see a cat dancing',
            'path' => '/this/folder/dancing_cat'
        ]);
    }
}
