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

        Text::factory()->create([
            'location' => 'individuele_trajecten',
            'description' => 'Op deze pagina vindt u een overzicht van de beschikbare ritten van andere leden.
             U kunt hier filteren op naam en afstand. Als u een rit wilt downloaden, klikt u op de downloadknop.'
        ]);

        Text::factory()->create([
            'location' => 'kleding',
            'description' => 'Op deze pagina vindt u een overzicht van de beschikbare kledingstukken.
             U kunt het gewenste kledingstuk selecteren en de gewenste maat kiezen. Klik vervolgens op de knop "Bestellen".'
        ]);

        Text::factory()->create([
            'location' => 'groepsritten',
            'description' => 'Op deze pagina vindt u een overzicht van de beschikbare groepsritten.
             U kunt hier filteren op groep, dag en afstand. Onderaan de pagina vindt u een overzicht van ingeschreven groepsritten.'
        ]);



    }
}
