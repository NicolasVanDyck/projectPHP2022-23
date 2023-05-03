<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Database\Seeders\ImageSeeder;

class ImageSeederTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @covers \Database\Seeders\ImageSeeder::run
     */
    public function test_image_seeder(): void
    {
        $this->seed(ImageSeeder::class);
        $this->assertDatabaseCount('images', 10);
    }
}
