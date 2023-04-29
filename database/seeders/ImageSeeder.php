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
        $imageTypes = ['sponsor', 'image'];
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
//image_type_id of image_types_id??

        Image::factory()->create([
            'image_types_id' => 2,
            'name' => 'foto1',
            'description' => 'foto1',
            'path' => 'storage/app/public/images/Foto1.jpg',
        ]);

        Image::factory()->create([
            'image_types_id' => 2,
            'name' => 'foto2',
            'description' => 'foto2',
            'path' => 'storage/app/public/images/Foto2.jpg',
        ]);

        Image::factory()->create([
            'image_types_id' => 2,
            'name' => 'foto3',
            'description' => 'foto3',
            'path' => 'storage/app/public/images/Foto3.jpg',
        ]);

        Image::factory()->create([
            'image_types_id' => 2,
            'name' => 'foto4',
            'description' => 'foto4',
            'path' => 'storage/app/public/images/Foto4.jpg',
        ]);

        Image::factory()->create([
            'image_types_id' => 2,
            'name' => 'foto5',
            'description' => 'foto5',
            'path' => 'storage/app/public/images/Foto5.jpg',
        ]);

        Image::factory()->create([
            'image_types_id' => 2,
            'name' => 'foto6',
            'description' => 'foto6',
            'path' => 'storage/app/public/images/Foto6.jpg',
        ]);

        Image::factory()->create([
            'image_types_id' => 2,
            'name' => 'foto7',
            'description' => 'foto7',
            'path' => 'storage/app/public/images/Foto7.jpg',
        ]);

        Image::factory()->create([
            'image_types_id' => 2,
            'name' => 'foto8',
            'description' => 'foto8',
            'path' => 'storage/app/public/images/Foto8.jpg',
        ]);

        Image::factory()->create([
            'image_types_id' => 2,
            'name' => 'foto9',
            'description' => 'foto9',
            'path' => 'storage/app/public/images/Foto9.jpg',
        ]);

        Image::factory()->create([
            'image_types_id' => 2,
            'name' => 'foto10',
            'description' => 'foto10',
            'path' => 'storage/app/public/images/Foto10.jpg',
        ]);

        Image::factory()->create([
            'image_types_id' => 2,
            'name' => 'foto11',
            'description' => 'foto11',
            'path' => 'storage/app/public/images/Foto11.jpg',
        ]);

        Image::factory()->create([
            'image_types_id' => 2,
            'name' => 'foto12',
            'description' => 'foto12',
            'path' => 'storage/app/public/images/Foto12.jpg',
        ]);

        Image::factory()->create([
            'image_types_id' => 2,
            'name' => 'foto13',
            'description' => 'foto13',
            'path' => 'storage/app/public/images/Foto13.jpg',
        ]);

        Image::factory()->create([
            'image_types_id' => 2,
            'name' => 'foto14',
            'description' => 'foto14',
            'path' => 'storage/app/public/images/Foto14.jpg',
        ]);

        Image::factory()->create([
            'image_types_id' => 2,
            'name' => 'foto15',
            'description' => 'foto15',
            'path' => 'storage/app/public/images/Foto15.jpg',
        ]);

        Image::factory()->create([
            'image_types_id' => 2,
            'name' => 'foto16',
            'description' => 'foto16',
            'path' => 'storage/app/public/images/Foto16.jpg',
        ]);

        Image::factory()->create([
            'image_types_id' => 2,
            'name' => 'foto17',
            'description' => 'foto17',
            'path' => 'storage/app/public/images/Foto17.jpg',
        ]);

        Image::factory()->create([
            'image_types_id' => 2,
            'name' => 'foto18',
            'description' => 'foto18',
            'path' => 'storage/app/public/images/Foto18.jpg',
        ]);

        Image::factory()->create([
            'image_types_id' => 2,
            'name' => 'foto19',
            'description' => 'foto19',
            'path' => 'storage/app/public/images/Foto19.jpg',
        ]);

        Image::factory()->create([
            'image_types_id' => 2,
            'name' => 'foto20',
            'description' => 'foto20',
            'path' => 'storage/app/public/images/Foto20.jpg',
        ]);

        Image::factory()->create([
            'image_types_id' => 2,
            'name' => 'foto21',
            'description' => 'foto21',
            'path' => 'storage/app/public/images/Foto21.jpg',
        ]);

        Image::factory()->create([
            'image_types_id' => 2,
            'name' => 'foto22',
            'description' => 'foto22',
            'path' => 'storage/app/public/images/Foto22.jpg',
        ]);

        Image::factory()->create([
            'image_types_id' => 2,
            'name' => 'foto23',
            'description' => 'foto23',
            'path' => 'storage/app/public/images/Foto23.jpg',
        ]);

        Image::factory()->create([
            'image_types_id' => 2,
            'name' => 'foto24',
            'description' => 'foto24',
            'path' => 'storage/app/public/images/Foto24.jpg',
        ]);

        Image::factory()->create([
            'image_types_id' => 2,
            'name' => 'foto25',
            'description' => 'foto25',
            'path' => 'storage/app/public/images/Foto25.jpg',
        ]);

        Image::factory()->create([
            'image_types_id' => 2,
            'name' => 'foto26',
            'description' => 'foto26',
            'path' => 'storage/app/public/images/Foto26.jpg',
        ]);

        Image::factory()->create([
            'image_types_id' => 2,
            'name' => 'foto27',
            'description' => 'foto27',
            'path' => 'storage/app/public/images/Foto27.jpg',
        ]);

        Image::factory()->create([
            'image_types_id' => 2,
            'name' => 'foto28',
            'description' => 'foto28',
            'path' => 'storage/app/public/images/Foto28.jpg',
        ]);

        Image::factory()->create([
            'image_types_id' => 2,
            'name' => 'foto29',
            'description' => 'foto29',
            'path' => 'storage/app/public/images/Foto29.jpg',
        ]);

    }
}
