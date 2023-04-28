<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Activity>
 */
class ActivityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $start = $this->faker->date();
        $end = $this->faker->dateTimeBetween($start,'+1 week');

        return [
            'startDate' => $this->faker->$start,
            'endDate' => $this->faker->$end,
            'name' => $this->faker->name(),
            'description' => $this->faker->unique()->paragraph(3),
        ];
    }
}
