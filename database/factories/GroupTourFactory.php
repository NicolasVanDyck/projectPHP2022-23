<?php

namespace Database\Factories;

use App\Models\Group;
use App\Models\Route;
use App\Models\Tour;
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
//         $startdate = $this->faker->date();
//         $starttime = $this->faker->time();
//         $enddate = $this-> faker->date($startdate,'+1 week');

        return [
            'group_id' => function () {
                return Group::factory()->create()->id;
            },
            'tour_id' => Tour::factory(),
            'start_date' => $this->faker->dateTimeBetween('+1 week', '+5 month'),
            'start_time' => $this->faker->time(),
            'end_date' => $this->faker->date()

        ];
    }
}
