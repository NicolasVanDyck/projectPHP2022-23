<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Database\Seeders\SizeSeeder;

class SizeTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Runs the SizeSeeder before each test.
     */
    public function create_sizes(): void
    {
        $this->seed(SizeSeeder::class);
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
     * Asserts that the number of sizes created by the SizeSeeder are 5. The sizes are created in the productsize test.
     * @test
     */
    public function test_sizes_table_has_five_records(): void
    {
        $this->assertDatabaseCount('sizes', 5);
    }
}
