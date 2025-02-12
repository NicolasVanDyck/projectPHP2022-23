<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Activity;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Activity>
 */
class ActivityFactory extends Factory
{

    protected $model  = Activity::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $start = $this->faker->dateTime();
        $end = $this->faker->dateTimeBetween($start,'+1 week');

        return [
            'start_date' => $start,
            'end_date' => $end,
            'name' => $this->faker->name(),
            'description' => $this->faker->unique()->paragraph(3),
        ];
    }
}
