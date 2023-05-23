<?php

namespace Database\Seeders;

use App\Models\Text;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TextSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Text::factory()->create([
            'location' => 'Home',
            'description' => 'Welkom op onze homepagina! 
            Hier vindt u alle informatie over onze wielerclub De Wezeldrivers!'
        ]);

        Text::factory()->create([
            'location' => 'Contact',
            'description' => 'Heeft u vragen of opmerkingen? 
            Neem dan contact met ons op via het contactformulier!'
        ]);

    }
}
