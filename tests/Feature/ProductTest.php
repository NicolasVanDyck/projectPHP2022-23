<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Database\Seeders\ProductSeeder;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Runs the ProductSeeder before each test.
     */
    public function create_ten_products(): void
    {
        $this->seed(ProductSeeder::class);
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
     * Asserts that the number of products created by the ProductSeeder are 10.
     * @test
     */
    public function test_products_table_has_10_records(): void
    {
        $this->create_ten_products();
        $this->assertDatabaseCount('products', 101);
    }
}
