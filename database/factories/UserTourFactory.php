<?php

namespace Database\Factories;

use App\Models\GroupTour;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\UserTour;
use App\Models\User;
use App\Models\Tour;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserTour>
 */
class UserTourFactory extends Factory
{

    protected $model = UserTour::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $tourId = Tour::factory()->create()->id;

        return [
            'user_id' => function() {
                return User::all()->random();
            },
            'tour_id' => $tourId,
            'group_tour_id' => GroupTour::factory()->create(['tour_id' => $tourId])->id,
        ];
    }
}
