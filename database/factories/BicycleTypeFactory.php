<?php

namespace Database\Factories;

use App\Models\BicycleType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BicycleType>
 */
class BicycleTypeFactory extends Factory
{
    protected $model = BicycleType::class;

    private array $bikes = ['Koers', 'MTB'];

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array
    {

        return [
            'bicycleType' => $this ->faker->unique()->randomElement($this->bikes),
        ];
    }
}
