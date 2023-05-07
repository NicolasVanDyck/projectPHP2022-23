<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Size;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Runs the database seeder for Products and also seeds the sizes and pivot table (productsizes).
     * An array sizes is declared and assigned to the sizes table.
     * The sizes are then randomly selected and assigned to the products table.
     * The pivot table is also updated, but never any doubles (like 2x t-shirt xs).
     * This is because of the syncWithoutDetaching method.
     */
    public function run(): void
    {
        $sizes = ['extra small', 'small', 'medium', 'large', 'extra large'];
        $randomSize = rand(1, count($sizes));

        foreach ($sizes as $size)
        {
            Size::firstOrCreate(['size' => $size]);
        }

        $products = Product::factory(20)->create();

        foreach ($products as $product) {
            $sizes = Size::inRandomOrder()->take($randomSize)->pluck('id');
            $product->sizes()->syncWithoutDetaching($sizes);
        }
    }
}

