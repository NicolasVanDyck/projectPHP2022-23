<?php

namespace Tests\Feature;

use Database\Seeders\ImageSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\UserTourSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AllSeedersTest extends TestCase
{
    // This tests, tests all the seeders.
    // It is not necessary to test the seeders, but it is a good practice to do so.
    // This way you can be sure that the seeders work as intended.
    // If you change the seeders, you can run this test to see if they still work as intended.

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
     * ImageSeeder test.
     * @return void
     *
     * @test
     * @covers ImageSeeder::run()
     */
    public function testImageSeeder(): void
    {
        // Refresh the database.
        $this->refreshDatabase();

        if ($this->assertDatabaseEmpty('images')) {
            $this->seed(ImageSeeder::class);
            $this->assertDatabaseCount('images', 29);
        }
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
        $this->assertDatabaseCount('images', 1);
        $this->assertDatabaseCount('image_types', 3);
        $this->assertDatabaseCount('user_tours', 1);
    }



    /**
     * UserSeeder test.
     * @return void
     *
     * @test
     * @covers UserSeeder::run()
     */
    public function testUserSeeder(): void
    {
        $this->seed(UserSeeder::class);
        $this->assertDatabaseCount('users', 52);
    }

}
