<?php

namespace Database\Factories;

use App\Models\Group;
use App\Models\Route;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\GroupTour>
 */
class GroupTourFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
         $start = $this->faker->dateTime();
         $end = $this-> faker->dateTimeBetween($start,'+1 week');

         return [
             'group_id' => function() {
                return Group::factory()->create()->id;
                },
             'start_date' => $this ->faker->dateTime(now()),
             'end_date' => $this ->faker->dateTimeBetween(now(),'+1 week')
        ];
    }
}
