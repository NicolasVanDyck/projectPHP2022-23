<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BicycleType>
 */
class BicycleTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    private array $bikes = ['Koers', 'Bakfiets', 'MTB',];
    public function definition(): array
    {

        return [
            'name' => $this ->faker->unique()->randomElement($this->bikes),
        ];
    }
}
