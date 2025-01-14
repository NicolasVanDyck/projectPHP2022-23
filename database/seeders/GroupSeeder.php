<?php

namespace Database\Seeders;

use App\Models\Group;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Group::factory()->create([
            'group' => 'A',
        ]);

        Group::factory()->create([
            'group' => 'B',
        ]);

        Group::factory()->create([
            'group' => 'C',
        ]);

        Group::factory()->create([
            'group' => 'Dames',
        ]);
    }
}
