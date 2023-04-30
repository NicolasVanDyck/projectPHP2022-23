<?php

namespace Tests\Feature;

use App\Models\Text;
use Database\Seeders\TextSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TextSeederTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Run the TextSeeder before each test.
     *
     * @covers TextSeeder::run
     * @return void
     * @test
     */

    public function create_five_texts(): void
    {
       $this->assertDatabaseEmpty('texts');
       $this->seed(TextSeeder::class);
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
     * Asserts that the number of texts created by the TextSeeder are 5.
     * Asserts that number of texts created by the TextSeeder, or in the database are 5
     * This is the amount of texts in the array in the TextSeeder.
     *
     * @covers TextSeeder::run
     * @test
     */
    public function test_texts_seeder(): void
    {
        // Count the number of texts in the database
        $count = Text::all()->count();

        $this->create_five_texts();
        $this->assertDatabaseCount('texts', $count + 5);
    }
}
