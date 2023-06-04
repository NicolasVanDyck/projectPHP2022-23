<?php

namespace Database\Factories;

use App\Models\Image;
use App\Models\ImageType;
use App\Models\Tour;
use Exception;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{

    protected $model = Image::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     * @throws Exception
     */
    public function definition(): array
    {
        // Image types array.
        $imageTypes = ['Rit', 'Sponsor'];

        $imageTypeArray = [];

        // Create image types and append to the array if not in the array yet.
        foreach ($imageTypes as $imageType) {
            $imageType = ImageType::updateOrCreate(['image_type' => $imageType]);
            if (!in_array($imageType->id, $imageTypeArray)) {
                $imageTypeArray[] = $imageType->id;
            }
        }

        return [
            'tour_id' => null,
            'image_type_id' => $this->faker->randomElement($imageTypeArray),
            'name' => $this->faker->name(),
            'description' => $this->faker->words(2, true),
            'path' => $this->faker->filePath(),
        ];
    }
}
