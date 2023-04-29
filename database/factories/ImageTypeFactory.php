<?php

namespace Database\Factories;

use App\Models\ImageType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ImageType>
 */
class ImageTypeFactory extends Factory
{
    /**
     * The factory's corresponding model.
     */
    protected $model = ImageType::class;
    private array $types = ['sponsor', 'image'];

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'imageType'=> $this->faker->unique()->randomElement($this->types),
        ];
    }
}
