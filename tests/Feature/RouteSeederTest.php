<?php

namespace Tests\Feature;

use App\Models\Route;
use Database\Seeders\RouteSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RouteSeederTest extends TestCase
{
    use RefreshDatabase;

    // Reset the testdatabase:


    /**
     * Runs the RouteSeeder before each test.
     */
    public function create_hundred_routes(): void
    {
        $this->seed(RouteSeeder::class);
    }

    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/test');

        $response->assertStatus(200);
    }

    /**
     * Asserts that the number of routes created by the RouteSeeder are 100.
     * Asserts that number of sizes created by the RouteSeeder, or in the database are 2
     * This is the amount of sizes in the array in the RouteSeeder.
     *
     * @covers RouteSeeder::run
     * @test
     */
    public function test_routes_seeder(): void
    {
        // Count the number of routes in the database
        $count = Route::all()->count();

        $this->create_hundred_routes();
        $this->assertDatabaseCount('routes', $count+ 100);
        $this->assertDatabaseCount('bicycle_types', 2);
    }
}
