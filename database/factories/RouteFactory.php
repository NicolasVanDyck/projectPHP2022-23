<?php

namespace Database\Factories;

use App\Models\Image;
use App\Models\Route;
use Illuminate\Database\Eloquent\Factories\Factory;

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
            'amount_of_km' => $this ->faker-> randomFloat(2, 1, 100),
            'name' => $this ->faker-> name(),
            'created_at' => $this ->faker-> dateTime(),
            'image_id' => Image::factory()->create()->id,
        ];
    }
}
