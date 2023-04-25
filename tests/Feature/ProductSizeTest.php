<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Database\Seeders\ProductSizeSeeder;

class ProductSizeTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Runs the ProductSizeSeeder before each test.
     */
    public function create_product_sizes(): void
    {
        $this->seed(ProductSizeSeeder::class);
    }

    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * Asserts that the number of product_sizes created by the ProductSizeSeeder are 10.
     * @test
     */
    public function test_product_sizes_table_has_10_records(): void
    {
        $this->create_product_sizes();
        $this->assertDatabaseCount('product_sizes', 10);
    }
}
