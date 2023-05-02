<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\ImageType;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
//        $countRecords = Image::all()->count();
//
//        function create_images($count, $countRecords)
//        {
//            for ($i = 1; $i <= $count; $i++) {
//                $photo = 'foto_' . $i;
//                $description = 'fotodescription_' . $i;
//                $path = 'storage/app/public/images/Foto' . $i . '.jpg';
//
//                if ($countRecords == 0) {
//                    Image::factory()->create([
//                        'name' => $photo,
//                        'description' => $description,
//                        'path' => $path,
//                    ]);
//                }
//            }
//        }

//        create_images(29, $countRecords);

        Image::factory(10)->create();
//        $imageTypes = ['product', 'route', 'user'];
//        $randomImageType = rand(1, count($imageTypes));
//
//        foreach ($imageTypes as $imageType)
//        {
//            ImageType::firstOrCreate(['image_type' => $imageType]);
//        }
//
//        $images = Image::factory(29)->create();
//
//        foreach ($images as $image) {
//            $imageTypes = ImageType::inRandomOrder()->take($randomImageType)->pluck('id');
//            $image->imagetype();
//        }
    }
}
