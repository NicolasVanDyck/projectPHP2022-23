<?php

namespace Database\Factories;

use App\Models\Route;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\BicycleType;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Route>
 */
class RouteFactory extends Factory
{
    protected $model = Route::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'start_location' => $this ->faker-> word(),
            'end_location' => $this ->faker-> word(),
            'amount_of_km' => $this ->faker-> randomFloat(),
            'name' => $this ->faker-> name(),
            'created_at' => $this ->faker-> dateTime(),
            'bicycle_type_id' => function() {
                return BicycleType::factory()->create()->id;
            }
        ];
    }
}
