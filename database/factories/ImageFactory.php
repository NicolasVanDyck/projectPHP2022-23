<?php

namespace Database\Factories;

use App\Models\Image;
use App\Models\ImageType;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{

    protected $model = \App\Models\Image::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $imageTypes = ['product', 'route', 'user'];
        $randomImageType = rand(1, count($imageTypes));

        foreach ($imageTypes as $imageType)
        {
            ImageType::firstOrCreate(['image_type' => $imageType]);
        }

        return [
            'image_type_id' => random_int(1, 3),
            'name' => $this->faker->name(),
            'description' => $this->faker->words(2,true),
            'path' => $this->faker->filePath(),
        ];
    }
}
