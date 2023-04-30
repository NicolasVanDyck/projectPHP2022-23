<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Database\Seeders\UserTourSeeder;

class UserTourTest extends TestCase
{
    use RefreshDatabase;


    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/test');

        $response->assertStatus(200);
    }

    /**
     * UserTourSeeder test.
     * @return void
     *
     * @test
     * @covers UserTourSeeder::run()
     */
    public function testUserTourSeeder(): void
    {
        $this->seed(UserTourSeeder::class);
        $this->assertDatabaseCount('user_tours', 1);
    }

}
