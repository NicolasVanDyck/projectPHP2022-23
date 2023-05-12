<?php

namespace Tests\Feature;

use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ClothingOrderTest extends TestCase
{
    use RefreshDatabase;

    public function seedDatabase(): void
    {
        $this->seed(DatabaseSeeder::class);
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
     * Test the getProducts method from the livewire Kleding component.
     * Test if the return type is array and the count is 10.
     * @covers \App\Http\Livewire\Member\Kleding::getProducts()
     * @return void
     */
    public function test_getProducts(): void
    {
        $this->seedDatabase();
        $kleding = new \App\Http\Livewire\Member\Kleding();
        $products = $kleding->getProducts();
        $this->assertIsArray($products);
        $this->assertCount(10, $products);
    }
}
