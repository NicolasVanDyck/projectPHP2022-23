<?php

namespace Tests\Feature;

use App\Models\Activity;
use Database\Seeders\ActivitySeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ActivitySeederTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Run the ActivitySeeder before each test.
     *
     * @covers ActivitySeeder::run
     * @return void
     * @test
     */

    public function create_five_activities(): void
    {
       $this->assertDatabaseEmpty('activities');
       $this->seed(ActivitySeeder::class);
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
     * Asserts that the number of activities created by the ActivitiesSeeder are 5.
     * Asserts that number of activities created by the ActivitiesSeeder, or in the database are 5
     * This is the amount of activities in the array in the ActivitiesSeeder.
     *
     * @covers ActivitySeeder::run
     * @test
     */
    public function test_activities_seeder(): void
    {
        // Count the number of activities in the database
        $count = Activity::all()->count();

        $this->create_five_activities();
        $this->assertDatabaseCount('activities', $count + 5);
    }
}
