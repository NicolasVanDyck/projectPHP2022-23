<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
            'startLocation' => $this ->faker-> startLocation (),
            'endLocation' => $this ->faker-> endLocation (),
            'amountOfKM' => $this ->faker-> amountOfKM(),
            'name' => $this ->faker-> name(),
            'createdAt' => $this ->faker-> createdAt (),
        ];
    }
}
