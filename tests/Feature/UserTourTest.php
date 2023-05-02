<?php

namespace Tests\Feature;

use App\Models\Image;
use Database\Seeders\ImageSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Database\Seeders\UserTourSeeder;

class UserTourTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Assert the images table is empty.
     */
    public function test_images_table_empty(): void
    {
        $this->assertDatabaseCount('images', 0);
    }

    /**
     * Assert the image_types table is empty.
     */
    public function test_image_types_table_empty(): void
    {
        $this->assertDatabaseCount('image_types', 0);
    }

    /**
     * Assert the database is empty.
     */
    public function test_database_empty(): void
    {
        $this->assertDatabaseCount('user_tours', 0);
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
        $this->assertDatabaseCount('images', 5);
        $this->assertDatabaseCount('image_types', 3);
        $this->assertDatabaseCount('user_tours', 5);
    }

}
