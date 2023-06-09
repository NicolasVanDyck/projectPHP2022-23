<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\GPX;

class GPXSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
//        GPX::factory(3)->create();

        GPX::factory()->create([
            'name' => 'Rit 1',
            'amount_of_km' => 52.45,
            'route' => 'Niet getoond',
            'path' => 'gpx/rit1.gpx',
            'user_id' => 1,
        ]);
        GPX::factory()->create([
            'name' => 'Zwarte Goudroute',
            'amount_of_km' => 152.45,
            'route' => 'Niet getoond',
            'path' => 'gpx/Zwarte_Goudroute.gpx',
            'user_id' => 1,
        ]);
        GPX::factory()->create([
            'name' => 'Kempenroute',
            'amount_of_km' => 92.45,
            'route' => 'Niet getoond',
            'path' => 'gpx/Kempenroute.gpx',
            'user_id' => 4,
        ]);
        GPX::factory()->create([
            'name' => 'Bels Lijntje',
            'amount_of_km' => 33.4,
            'route' => 'Niet getoond',
            'path' => 'gpx/Bels_Lijntje.gpx',
            'user_id' => 9,
        ]);

        GPX::factory()->create([
            'name' => 'Achelse Kluisroute',
            'amount_of_km' => 52.45,
            'route' => 'Niet getoond',
            'path' => 'gpx/Achelse_Kluisroute.gpx',
            'user_id' => 8,
        ]);
        GPX::factory()->create([
            'name' => 'Antwerpse Havenroute',
            'amount_of_km' => 61.21,
            'route' => 'Niet getoond',
            'path' => 'gpx/Antwerpse_Havenroute.gpx',
            'user_id' => 6,
        ]);
        GPX::factory()->create([
            'name' => 'Duvelroute',
            'amount_of_km' => 19.21,
            'route' => 'Niet getoond',
            'path' => 'gpx/Duvelroute.gpx',
            'user_id' => 8,
        ]);
        GPX::factory()->create([
            'name' => 'Fietslus Blankenberge',
            'amount_of_km' => 23.47,
            'route' => 'Niet getoond',
            'path' => 'gpx/Fietslus_Blankenberge.gpx',
            'user_id' => 9,
        ]);
        GPX::factory()->create([
            'name' => 'Kasteelbossenroute',
            'amount_of_km' => 38.58,
            'route' => 'Niet getoond',
            'path' => 'gpx/Kasteelbossenroute.gpx',
            'user_id' => 15,
        ]);
        GPX::factory()->create([
            'name' => 'Zeevogelroute',
            'amount_of_km' => 28.37,
            'route' => 'Niet getoond',
            'path' => 'gpx/Zeevogelroute.gpx',
            'user_id' => 11,
        ]);
    }
}
