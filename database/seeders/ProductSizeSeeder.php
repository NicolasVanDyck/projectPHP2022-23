<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProductSize;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Support\Facades\Schema;

class ProductSizeSeeder extends Seeder
{

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        ProductSize::truncate();
        Product::truncate();
        Size::truncate();

        ProductSize::factory(10)->create();
        Schema::enableForeignKeyConstraints();
    }
}
