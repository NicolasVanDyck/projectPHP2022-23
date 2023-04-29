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
        $imageTypes = ['sponsor', 'image', 'route'];

        foreach ($imageTypes as $imageType)
        {
            ImageType::firstOrCreate(['image_type' => $imageType]);
        }

        function create_photos($count) {
            for ($i = 1; $i <= $count; $i++) {
                $photo = 'foto' . $i;
                $description = 'foto' . $i;
                $path = 'storage/app/public/images/Foto' . $i . '.jpg';
                // TODO: adjust to if not exists.
                Image::factory()->create([
                    'image_types_id' => '2',
                    'name' => $photo,
                    'description' => $description,
                    'path' => $path,
                ]);
            }
        }

        create_photos(29);
    }
}
