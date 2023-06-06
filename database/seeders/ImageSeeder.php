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
        for($i = 1; $i <= 5; $i++) {
            Image::factory()->create([
                'image_type_id' => 1,
                'tour_id' => 1,
                'name' => 'Foto ' . $i,
                'description' => 'Foto ' . $i,
                'path' => '/storage/galerij/Foto' . $i . '.jpg',
                'in_carousel' => 1,
            ]);
        }

        for($i = 6; $i <= 12; $i++) {
            Image::factory()->create([
                'image_type_id' => 1,
                'tour_id' => 2,
                'name' => 'Foto ' . $i,
                'description' => 'Foto ' . $i,
                'path' => '/storage/galerij/Foto' . $i . '.jpg',
                'in_carousel' => 1,
            ]);
        }

        for($i = 13; $i <= 18; $i++) {
            Image::factory()->create([
                'image_type_id' => 1,
                'tour_id' => 3,
                'name' => 'Foto ' . $i,
                'description' => 'Foto ' . $i,
                'path' => '/storage/galerij/Foto' . $i . '.jpg',
                'in_carousel' => 1,
            ]);
        }

        for($i = 19; $i <= 22; $i++) {
            Image::factory()->create([
                'image_type_id' => 1,
                'tour_id' => 4,
                'name' => 'Foto ' . $i,
                'description' => 'Foto ' . $i,
                'path' => '/storage/galerij/Foto' . $i . '.jpg',
                'in_carousel' => 1,
            ]);
        }

        for($i = 23; $i <= 29; $i++) {
            Image::factory()->create([
                'image_type_id' => 1,
                'tour_id' => 5,
                'name' => 'Foto ' . $i,
                'description' => 'Foto ' . $i,
                'path' => '/storage/galerij/Foto' . $i . '.jpg',
                'in_carousel' => 1,
            ]);
        }

//        Creëer sponsor images (if-statement binnen for-loop wilde niet werken, dus twee for-loops)
        $sponsors = ['Sponser Brik Pilee', 'Logo2020JPEGKlein', 'poeier', 'Hekwerk Sponsor', 'kwtc', 'logo-radesol-sponsor', 'spar', 'VanHees Sponsor'];

        for ($i = 1; $i <= 3; $i++) {
            Image::factory()->create([
                'image_type_id' => 2,
                'name' => 'Sponsor ' . $i,
                'description' => 'Sponsor ' . $i,
                'path' => '/storage/sponsor/' . $sponsors[$i - 1] . '.jpg',
            ]);
        }

        for ($i = 4; $i <= 8; $i++) {
            Image::factory()->create([
                'image_type_id' => 2,
                'name' => 'Sponsor ' . $i,
                'description' => 'Sponsor ' . $i,
                'path' => '/storage/sponsor/' . $sponsors[$i - 1] . '.png',
            ]);
        }
    }
}
