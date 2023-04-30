<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Tour;
use App\Models\Route;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tour>
 */
class TourFactory extends Factory
{

    protected $model = Tour::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'route_id' => function() {
                return Route::factory()->create()->id;
            },
            'start_date' => $this->faker->dateTime('now'),
            'end_date' => $this->faker->dateTimeBetween('now', '+1 years'),

        ];
    }
}
