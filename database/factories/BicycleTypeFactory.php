<?php

namespace Database\Factories;

use App\Models\BicycleType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BicycleType>
 */
class BicycleTypeFactory extends Factory
{
    protected $model = BicycleType::class;

//    private array $bikes = ['Koers', 'MTB'];

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array
    {
        // The bicycletypefactory is not used anyway. So I commented most of it out.
        return ['bicycle_type' => 'MTB'];

//        return [
//            'bicycle_type' => $this ->faker->unique()->randomElement($this->bikes),
//        ];
    }
}
