<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\GPX;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\GPX>
 */
class GPXFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = GPX::class;

    public function definition(): array
    {
        return [
            'user_id' => function() {
                return User::factory()->create()->id;
            },
            'path' => $this->faker->filePath(),
            'start_location' => $this->faker->word(),
            'end_location' => $this->faker->word(),
            'amount_of_km' => $this->faker->randomFloat(2, 0, 200),
            'name' => $this->faker->name(),
        ];
    }
}
