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
     * Assert the product_size table exists and is seeded.
     * @covers \App\Models\ProductSize
     * @return void
     * @throws \Exception
     */
    public function test_product_size_table_exists(): void
    {
        $this->seedDatabase();
        $this->assertDatabaseHas('product_size', [
            'id' => 1,
        ]);
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
