<?php

namespace Tests\Feature;

use App\Models\Product;
use Database\Seeders\ProductSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Runs the ProductSeeder before each test.
     */
    public function create_hundred_products(): void
    {
        $this->seed(ProductSeeder::class);
    }

    /**
     * Asserts that the number of products created by the ProductSeeder are 100.
     * Asserts that number of sizes created by the ProductSeeder, or in the database are 5
     * This is the amount of sizes in the array in the productseeder.
     *
     * @covers ProductSeeder::run
     * @test
     */
    public function test_products_seeder(): void
    {
        // Count the number of products in the database
        $count = Product::all()->count();

        $this->create_hundred_products();
        $this->assertDatabaseCount('products', $count+ 100);
        $this->assertDatabaseCount('sizes', 5);
    }
}
