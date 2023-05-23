<?php

namespace Database\Seeders;

use App\Models\Image;
use Illuminate\Database\Seeder;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
//        Creëer galerij images
        for($i = 1; $i <= 30; $i++) {
            Image::factory()->create([
                'image_type_id' => 3,
                'name' => 'Foto ' . $i,
                'description' => 'Foto ' . $i,
                'path' => '/storage/galerij/Foto' . $i . '.jpg',
            ]);
        }

//        Creëer sponsor images (if-statement binnen for-loop wilde niet werken, dus twee for-loops)
        $sponsors = ['Sponsor Brik Pilee', 'Logo2020JPEGKlein', 'poeier', 'Hekwerk Sponsor', 'kwtc', 'logo-radesol-sponsor', 'spar', 'VanHees Sponsor'];

        for($i = 1; $i <= 3; $i++) {
            Image::factory()->create([
                'image_type_id' => 1,
                'name' => 'Sponsor ' . $i,
                'description' => 'Sponsor ' . $i,
                'path' => '/storage/sponsor/' . $sponsors[$i-1] . '.jpg',
            ]);
        }

        for($i = 4; $i <= 8; $i++) {
            Image::factory()->create([
                'image_type_id' => 1,
                'name' => 'Sponsor ' . $i,
                'description' => 'Sponsor ' . $i,
                'path' => '/storage/sponsor/' . $sponsors[$i-1] . '.png',
            ]);
        }
    }
}
