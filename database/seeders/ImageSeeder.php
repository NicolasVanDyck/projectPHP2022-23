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
        $imageTypes = ['sponser', 'image'];
        $randomtype = rand(1,count($imageTypes));

        foreach ($imageTypes as $imageType)
        {
            ImageType::firstOrCreate(['imageType' => $imageType]);
        }

        $images = Image::factory(100)->create();

        foreach ($images as $image)
        {
            $imageType = ImageType::inRandomOrder()->take($randomtype)->pluck('id');
            $image->imageTypes()->syncWithoutDetaching($imageType);
        }
    }
}
