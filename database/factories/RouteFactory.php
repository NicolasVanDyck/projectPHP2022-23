<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\BicycleType;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Route>
 */
class RouteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'startLocation' => $this ->faker-> word(),
            'endLocation' => $this ->faker-> word(),
            'amountOfKm' => $this ->faker-> randomFloat(),
            'name' => $this ->faker-> name(),
            'createdAt' => $this ->faker-> dateTime(),
            'bicycletype_id' => function() {
                return BicycleType::factory()->create()->id;
            }
        ];
    }
}
