<?php

namespace Database\Factories;

use App\Models\ImageType;
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
        return [
            'name' => $this->faker->name(),
            'description' => $this->faker->words(10,true),
            'path' => $this->faker->filePath(),
            'image_type_id' => function() {
                return ImageType::factory()->create()->id;
            },
        ];
    }
}
