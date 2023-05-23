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

        Product::factory()->create([
            'name' => 'Trui met korte mouwen',
            'price' => 52.45,
        ]);

        Product::factory()->create([
            'name' => 'Trui met lange mouwen',
            'price' => 74.30,
        ]);

        Product::factory()->create([
            'name' => 'Windvest',
            'price' => 69.15,
        ]);

        Product::factory()->create([
            'name' => 'Wintervest',
            'price' => 113.40,
        ]);

        Product::factory()->create([
            'name' => 'Korte broek prr met bretel',
            'price' => 97.40,
        ]);

        Product::factory()->create([
            'name' => 'Korte broek prr zonder bretel',
            'price' => 81.15,
        ]);

        Product::factory()->create([
            'name' => 'Panty met bretel',
            'price' => 101,
        ]);

        Product::factory()->create([
            'name' => 'Panty zonder bretel',
            'price' => 90.10,
        ]);

        Product::factory()->create([
            'name' => 'Panty met bretel en zonder zeem',
            'price' => 89.60,
        ]);

        $products = Product::all();

        foreach ($products as $product) {
            $sizes = Size::inRandomOrder()->take($randomSize)->pluck('id');
            $product->sizes()->syncWithoutDetaching($sizes);
        }
    }
}

