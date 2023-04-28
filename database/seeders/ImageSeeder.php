<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\ImageType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = ['sponser', 'image'];
        $randomtype = rand(1,count($types));

        foreach ($types as $type)
        {
            ImageType::firstOrCreate(['type' => $type]);
        }

        $images = Image::factory(100)->create();

        foreach ($images as $image)
        {
            $types = ImageType::inRandomOrder()->take($randomtype)->pluck('id');
            $image->types()->syncWithoutDetaching($types);
        }
    }
}
