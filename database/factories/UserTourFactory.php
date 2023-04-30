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
        return [
            'user_id' => function() {
                return User::factory()->create()->id;
            },
            'group_tour_id' => function() {
                return GroupTour::factory()->create()->id;
            },
//            'tour_id' => function() {
//                return Tour::factory()->create()->id;
//            },
            'tour_id' => Tour::factory(),
        ];
    }
}
