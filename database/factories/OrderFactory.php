<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * The factory's corresponding model.
     */
    protected $model = \App\Models\Order::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        // Create users if they don't exist yet.
        $user = User::updateOrCreate([
            'name' => $this->faker->name(),
            'username' => $this->faker->userName(),
            'birthdate' => $this->faker->date(),
            'email' => $this->faker->email(),
            'postal_code' => $this->faker->postcode(),
            'address' => $this->faker->address(),
            'phone_number' => $this->faker->phoneNumber(),
            'password' => bcrypt('password'),
            'city'=> $this->faker->city(),
            'mobile_number' => $this->faker->phoneNumber(),
        ]);

// Get all the productsizes from product_size table.
        $product_sizes = DB::table('product_size')->get();

        // Get a random product_size from the product_size table.
        $product_size = $product_sizes->random();

        return [
            'product_size_id'=> $product_size->id,
            'user_id'=> $user->id,
            'order_date'=> now(),
            'quantity'=> $this->faker->randomDigit(),
        ];
    }
}
