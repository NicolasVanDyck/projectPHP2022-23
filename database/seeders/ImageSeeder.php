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
        function create_images($count, $nrImageTypes): void
        {
            for ($i = 1; $i <= $count; $i++) {
                $photo = 'foto' . $i;
                $description = 'foto' . $i;
                $path = 'storage/app/public/images/Foto' . $i . '.jpg';
                // TODO: adjust to if not exists.
                Image::firstOrCreate([
                    'image_type_id' => rand(1, $nrImageTypes),
                    'name' => $photo,
                    'description' => $description,
                    'path' => $path,
                ]);
            }
        }

        $imageTypes = ['sponsor', 'image', 'route'];
        $nrImageTypes = count($imageTypes);

        foreach ($imageTypes as $imageType)
        {
            ImageType::firstOrCreate(['image_type' => $imageType]);
        }

        create_images(29, $nrImageTypes);
    }
}
