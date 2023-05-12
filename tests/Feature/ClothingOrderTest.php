<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\ProductSize;
use App\Models\Size;
use App\Models\User;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire;
use Nette\Schema\ValidationException;
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
        $this->assertInstanceOf(Collection::class, $products);
        $this->assertCount(10, $products);
    }


    /**
     * Test the updateOrder method from the livewire Kleding component.
     *
     * @covers \App\Http\Livewire\Member\Kleding::updateOrder()
     * @return void
     */
    public function test_updateOrder(): void
    {

        $this->seedDatabase();

        // Login a user:
        $user = User::factory()->create();
        Auth::login($user);

        // Get a product, size and product_size_id from the database.
        $product = Product::inRandomOrder()->value('id');
        $size = Size::inRandomOrder()->value('id');
        $productSize = ProductSize::where('product_id', $product)
                                    ->where('size_id', $size)
                                    ->value('id');
//        dd($product, $size, $productSize);

        try {
            // Create a new instance of the Kleding component and pass the required parameters.
            $kleding = Livewire::test(\App\Http\Livewire\Member\Kleding::class,
                [
                    'selectedSize' => $size,
                    'selectedProduct' => $product,
                    'amount' => 1,
                    'user_id' => $user->id,
                ]);

            // Call the updateOrder method.
            $kleding->call('updateOrder');

            // Assert the order is created in the database.
            $this->assertDatabaseHas('orders', [
                'product_size_id' => $productSize,
                'user_id' => $user->id,
                'quantity' => 1,
            ]);

            // Assert the flash message is set correctly
            $this->assertEquals('Je bestelling is geplaatst!', session('message'));
        } catch (ValidationException $e) {
            $this->fail($e->getMessage());
        }

        // TODO finish the test since it still returns some inexplicable errors.
    }

    /**
     * Test the getSizesForSelectedProduct method from the livewire Kleding component.
     *
     * @covers \App\Http\Livewire\Member\Kleding::getSizesForSelectedProduct()
     * @return void
     */
    public function test_getSizesForSelectedProduct_returns_empty_array(): void
    {
        $this->seedDatabase();
        $kleding = new \App\Http\Livewire\Member\Kleding();

        $products = Product::all()->pluck('id')->toArray();
        $randomProduct = $products[array_rand($products)];

        $sizes = $kleding->getSizesForSelectedProduct($randomProduct);

        $this->assertInstanceOf(Collection::class, $sizes);
    }
}
