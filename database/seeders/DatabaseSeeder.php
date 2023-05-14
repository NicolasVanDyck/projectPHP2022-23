<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UserSeeder::class);
        $this->call(ImageSeeder::class);
        $this->call(UserTourSeeder::class);
        $this->call(ActivitySeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(OrderSeeder::class);
        $this->call(TextSeeder::class);
        $this->call(RouteSeeder::class);
    }
}
