<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\ProductSize;
use App\Models\Product;
use App\Models\Size;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductSize>
 */
class ProductSizeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProductSize::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // If the size and product tables are empty, create 5 sizes and 10 products.
         if (Size::all()->isEmpty() && Product::all()->isEmpty()) {
             $sizes = Size::factory(5)->create();
             $products = Product::factory(100)->create();
         }

        // This is just a temporary solution. Now so many products are created that there can't be a duplicate key->value pair.
        // I need to find a way to create a unique product_id and size_id pair.

        return [
            'product_id' => function () {
                return Product::all()->random()->id;
            },
            'size_id' => function () {
                // return a random id from the sizes table.
                return Size::all()->random()->id;
            },
        ];
    }
}
