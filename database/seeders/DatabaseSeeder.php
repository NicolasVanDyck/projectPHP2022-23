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
        User::factory(10)->create();
        // Runs the ImageSeeder.
        $this->call(ImageSeeder::class);
        // Runs the UserTourSeeder.
        $this->call(UserTourSeeder::class);
        // TODO add more seeders here...
    }
}
