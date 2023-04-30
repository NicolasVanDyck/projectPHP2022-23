<?php

namespace Tests\Feature;

use App\Models\Parameter;
use Database\Seeders\ParameterSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ParameterSeederTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Runs the ParameterSeeder before each test.
     *
     * @covers ParameterSeeder::run
     * @return void
     * @test
     */
    public function create_five_parameters(): void
    {
        $this->assertDatabaseEmpty('parameters');
        $this->seed(ParameterSeeder::class);
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
     * Asserts that the number of parameters created by the ParameterSeeder are 5.
     * Asserts that number of parameters created by the ParameterSeeder, or in the database are 5
     * This is the amount of parameters in the array in the parameterseeder.
     *
     * @covers ParameterSeeder::run
     * @test
     */
    public function test_parameters_seeder(): void
    {
        // Count the number of parameters in the database
        $count = Parameter::all()->count();

        $this->create_five_parameters();
        $this->assertDatabaseCount('parameters', $count + 5);
    }
}
