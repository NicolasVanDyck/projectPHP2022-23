<?php

namespace Database\Factories;

use App\Models\Size;
use Illuminate\Database\Eloquent\Factories\Factory;
use Symfony\Contracts\Service\Attribute\SubscribedService;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Size>
 */
class SizeFactory extends Factory
{
    /**
     * The factory's corresponding model.
     */
    protected $model = Size::class;
    private array $sizes = ['extra small', 'small', 'medium', 'large', 'extra large'];


    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Declare sizes small to extra large and return them in the array. Each size must be unique.
        return [
            'size' => $this->faker->unique()->randomElement($this->sizes),
        ];
    }
}
