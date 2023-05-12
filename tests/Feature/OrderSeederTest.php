<?php

namespace Tests\Feature;

use App\Models\Order;
use Database\Seeders\OrderSeeder;
use Database\Seeders\ProductSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class OrderSeederTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Runs the OrderSeeder before each test.
     */
    public function create_ten_orders(): void
    {
        $this->seed(ProductSeeder::class);
        $this->seed(OrderSeeder::class);
    }

    /**
     * Asserts that the number of orders created by the OrderSeeder are 10.
     *
     * @covers OrderSeeder::run
     * @test
     */
    public function test_orders_seeder(): void
    {
        // Count the number of orders in the database
        $count = Order::all()->count();

        $this->create_ten_orders();
        $this->assertDatabaseCount('orders', $count + 10);
    }
}
