<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Admin',
            'username' => 'admin',
            'birthdate' => '1987-12-18',
            'email' => 's0173395@student.thomasmore.be',
            'postal_code' => 2360,
            'city' => 'Oud-Turnhout',
            'address' => 'Rist 8',
            'phone_number' => null,
            'mobile_number' => null,
            'password' => Hash::make('admin123'),
            'is_admin' => true,
        ]);

        User::factory()->create([
            'name' => 'Ingritte Wellens',
            'username' => 'ingrittewellens',
            'birthdate' => '1954-01-19',
            'email' => 'ingritte.wellens@telenet.be',
            'postal_code' => 2400,
            'city' => 'Mol',
            'address' => 'Vieille Montagnestraat 11',
            'phone_number' => '014/81.02.37',
            'mobile_number' => '0498/63.81.49',
            'password' => Hash::make('ingrittew123'),
            'is_admin' => true,
        ]);

        User::factory()->create([
            'name' => 'Willy Boets',
            'username' => 'willyboets',
            'birthdate' => '1953-07-05',
            'email' => 'willy.boets@telenet.be',
            'postal_code' => 2490,
            'city' => 'Balen',
            'address' => 'Veldweg 21',
            'phone_number' => '014812666',
            'mobile_number' => '0479411814',
            'password' => Hash::make('willyb123'),
        ]);

        User::factory()->create([
            'name' => 'Luc Bogaerts',
            'username' => 'lucbogaerts',
            'birthdate' => '1962-07-24',
            'email' => 'veronique.sannen@telenet.be',
            'postal_code' => 2490,
            'city' => 'Balen',
            'address' => 'Vuurbergenstraat 8',
            'phone_number' => '014/65.00.71',
            'mobile_number' => '0475/28.59.44',
            'password' => Hash::make('lucb123'),
        ]);

        User::factory()->create([
            'name' => 'Rony Bogaerts',
            'username' => 'ronybogaerts',
            'birthdate' => '1959-07-11',
            'email' => 'ronybogaerts@hotmail.com',
            'postal_code' => 2490,
            'city' => 'Balen',
            'address' => 'Sportlaan 78',
            'phone_number' => null,
            'mobile_number' => '0498/61.17.58',
            'password' => Hash::make('ronyb123'),
        ]);

        User::factory()->create([
            'name' => 'Theo Bollen',
            'username' => 'theobollen',
            'birthdate' => '1938-07-14',
            'email' => 'bollentheo@skynet.be',
            'postal_code' => 2400,
            'city' => 'Mol',
            'address' => 'Vieille Montagnestraat 6',
            'phone_number' => '014/81.24.11',
            'mobile_number' => '0473/85.61.77',
            'password' => Hash::make('theob123'),
        ]);

        User::factory()->create([
            'name' => 'Patrick Cools',
            'username' => 'patrickcools',
            'birthdate' => '1964-02-26',
            'email' => 'patrick.cools5@telenet.be',
            'postal_code' => 2490,
            'city' => 'Balen',
            'address' => 'Hoevenweg 31',
            'phone_number' => null,
            'mobile_number' => '0485/68.20.59',
            'password' => Hash::make('patrickc123'),
        ]);

        User::factory()->create([
            'name' => 'Eddy Coomans',
            'username' => 'eddycoomans',
            'birthdate' => '1955-03-06',
            'email' => 'coomansje119@gmail.com',
            'postal_code' => 2400,
            'city' => 'Mol',
            'address' => 'Ringlaan 39',
            'phone_number' => '014/81.02.17',
            'mobile_number' => '0498/64.22.74',
            'password' => Hash::make('eddyc123'),
        ]);

        User::factory()->create([
            'name' => 'Luc Cuypers',
            'username' => 'luccuypers',
            'birthdate' => '1964-03-29',
            'email' => 'cuypers.luc@telenet.be',
            'postal_code' => 2400,
            'city' => 'Mol',
            'address' => 'Grotstraat 9',
            'phone_number' => null,
            'mobile_number' => '0477/31.01.91',
            'password' => Hash::make('lucc123'),
        ]);

        User::factory()->create([
            'name' => 'André Delen',
            'username' => 'andrédelen',
            'birthdate' => '1944-04-05',
            'email' => 'andredelen@skynet.be',
            'postal_code' => 2400,
            'city' => 'Mol',
            'address' => 'Brouwerijdreef',
            'phone_number' => null,
            'mobile_number' => '0473/98.64.22',
            'password' => Hash::make('andréd123'),
        ]);

        User::factory()->create([
            'name' => 'Jeff De Weerdt',
            'username' => 'jeffdeweerdt',
            'birthdate' => '1952-11-18',
            'email' => 'jeffdeweerdt@telenet.be',
            'postal_code' => 3920,
            'city' => 'Lommel',
            'address' => 'Molse Kiezel 251',
            'phone_number' => '011/54.09.38',
            'mobile_number' => '0495/53.09.38',
            'password' => Hash::make('jeffdw123'),
        ]);

        User::factory()->create([
            'name' => 'André Engelen',
            'username' => 'andréengelen',
            'birthdate' => '1952-03-10',
            'email' => 'andre_engelen1@telenet.be',
            'postal_code' => 2400,
            'city' => 'Mol',
            'address' => 'Duinstraat 9',
            'phone_number' => null,
            'mobile_number' => '0488/27.83.43',
            'password' => Hash::make('andrée123'),
        ]);

        User::factory()->create([
            'name' => 'Guy Faes',
            'username' => 'guyfaes',
            'birthdate' => '1971-05-31',
            'email' => 'carmendiels@hotmail.com',
            'postal_code' => 2400,
            'city' => 'Mol',
            'address' => 'Bremstraat 29',
            'phone_number' => '014/32.15.89',
            'mobile_number' => '0498/52.86.15',
            'password' => Hash::make('guyf123'),
        ]);

        User::factory()->create([
            'name' => 'Harry Geboers',
            'username' => 'harrygeboers',
            'birthdate' => '1946-03-27',
            'email' => 'hendrikgeboers@hotmail.com',
            'postal_code' => 2490,
            'city' => 'Balen',
            'address' => 'Zwarte Dreeferf 5',
            'phone_number' => '014/81.24.53',
            'mobile_number' => '0498/57.17.20',
            'password' => Hash::make('harryg123'),
        ]);

        User::factory()->create([
            'name' => 'Danny Geubbelmans',
            'username' => 'dannygeubbelmans',
            'birthdate' => '1959-04-24',
            'email' => 'danny.geubbelmans@telenet.be',
            'postal_code' => 2400,
            'city' => 'Mol',
            'address' => 'Vieille Montagnestraat 4',
            'phone_number' => null,
            'mobile_number' => '0472/97.58.20',
            'password' => Hash::make('dannyg123'),
        ]);

        User::factory()->create([
            'name' => 'Eddy Geubbelmans',
            'username' => 'eddygeubbelmans',
            'birthdate' => '1956-02-17',
            'email' => 'e.geubbelmans@hotmail.com',
            'postal_code' => 2490,
            'city' => 'Balen',
            'address' => 'Congostraat 5',
            'phone_number' => '014/81.20.79',
            'mobile_number' => '0477/97.03.97',
            'password' => Hash::make('eddyg123'),
        ]);

        User::factory()->create([
            'name' => 'Fernand Geubbelmans',
            'username' => 'fernandgeubbelmans',
            'birthdate' => '1948-04-09',
            'email' => 'ferdinand.geubbelmans@telenet.be',
            'postal_code' => 2400,
            'city' => 'Mol',
            'address' => 'Laurierstraat 4',
            'phone_number' => null,
            'mobile_number' => '0476/75.34.07',
            'password' => Hash::make('fernandg123'),
        ]);

        User::factory()->create([
            'name' => 'Jean Geuens',
            'username' => 'jeangeuens',
            'birthdate' => '1954-05-29',
            'email' => 'geuens.jean@outlook.com',
            'postal_code' => 2490,
            'city' => 'Balen',
            'address' => 'Kapelstraat 82',
            'phone_number' => '011/55.10.56',
            'mobile_number' => '0486/66.88.45',
            'password' => Hash::make('jeang123'),
        ]);

        User::factory()->create([
            'name' => 'Michel Geuens',
            'username' => 'michelgeuens',
            'birthdate' => '1947-08-13',
            'email' => 'michel.geuens@hotmail.com',
            'postal_code' => 2490,
            'city' => 'Balen',
            'address' => 'Pasdijk 7',
            'phone_number' => null,
            'mobile_number' => '0473/85.37.41',
            'password' => Hash::make('michelg123'),
        ]);

        User::factory()->create([
            'name' => 'Henri Hendriks',
            'username' => 'henrihendriks',
            'birthdate' => '1961-08-06',
            'email' => 'henri.hendriks@ah.nl',
            'postal_code' => 2490,
            'city' => 'Balen',
            'address' => 'Rijsbergdijk 13',
            'phone_number' => '061/097.07.96',
            'mobile_number' => '0495/61.95.07',
            'password' => Hash::make('henrih123'),
        ]);

        User::factory()->create([
            'name' => 'Sylvie Hendrikx',
            'username' => 'sylviehendrikx',
            'birthdate' => '1973-09-28',
            'email' => 'sylle.hendrikx@gmail.com',
            'postal_code' => 2490,
            'city' => 'Balen',
            'address' => 'Papenberg 21',
            'phone_number' => '011/75.93.29',
            'mobile_number' => '0499/72.60.15',
            'password' => Hash::make('sylvieh123'),
        ]);

        User::factory()->create([
            'name' => 'Fons Janssen',
            'username' => 'fonsjanssen',
            'birthdate' => '1947-07-10',
            'email' => 'fons.janssen11@telenet.be',
            'postal_code' => 2490,
            'city' => 'Balen',
            'address' => 'Kapelstraat 173',
            'phone_number' => null,
            'mobile_number' => '0497/79.12.88',
            'password' => Hash::make('fonsj123'),
        ]);

        User::factory()->create([
            'name' => 'Gilbert Joos',
            'username' => 'gilbertjoos',
            'birthdate' => '1952-10-08',
            'email' => 'gilbert.joos@telenet.be',
            'postal_code' => 2490,
            'city' => 'Balen',
            'address' => 'Soef 143',
            'phone_number' => '014/81.26.19',
            'mobile_number' => '0497/65.19.18',
            'password' => Hash::make('gilbertj123'),
        ]);

        User::factory()->create([
            'name' => 'Yvo Machiels',
            'username' => 'yvomachiels',
            'birthdate' => '1948-11-30',
            'email' => 'yvo.machiels@telenet.be',
            'postal_code' => 2490,
            'city' => 'Balen',
            'address' => 'Bankei 4',
            'phone_number' => '014/81.07.50',
            'mobile_number' => '0473/12.37.22',
            'password' => Hash::make('yvom123'),
        ]);

        User::factory()->create([
            'name' => 'Willy Machiels',
            'username' => 'willymachiels',
            'birthdate' => '1946-02-16',
            'email' => 'willy.machiels5@telenet.be',
            'postal_code' => 2400,
            'city' => 'Mol',
            'address' => 'Meyerstraat 3',
            'phone_number' => '014/81.08.94',
            'mobile_number' => '0472/42.47.68',
            'password' => Hash::make('willym123'),
        ]);

        User::factory()->create([
            'name' => 'Eddy Meynen',
            'username' => 'eddymeynen',
            'birthdate' => '1961-09-20',
            'email' => 'edje.meynen@telenet.be',
            'postal_code' => 2490,
            'city' => 'Balen',
            'address' => 'Gustaaf Wouterstraat 4 bus 3',
            'phone_number' => null,
            'mobile_number' => '0476/63.31.76',
            'password' => Hash::make('eddym123'),
        ]);

        User::factory()->create([
            'name' => 'Ludo Onraedt',
            'username' => 'ludoonraedt',
            'birthdate' => '1956-04-10',
            'email' => 'ludo@van-erum.be',
            'postal_code' => 3970,
            'city' => 'Leopoldsburg',
            'address' => 'Nachtegaalstraat 2',
            'phone_number' => '011/34.16.15',
            'mobile_number' => '0497/24.15.00',
            'password' => Hash::make('ludoon123'),
        ]);

        User::factory()->create([
            'name' => 'Ludo Opdebeek',
            'username' => 'ludoopdebeek',
            'birthdate' => '1952-05-29',
            'email' => 'ludo.opdebeek@telenet.be',
            'postal_code' => 2490,
            'city' => 'Balen',
            'address' => 'Balen-Neetlaan 33',
            'phone_number' => null,
            'mobile_number' => '0496/85.54.89',
            'password' => Hash::make('ludoop123'),
        ]);

        User::factory()->create([
            'name' => 'Chris Peeters',
            'username' => 'chrispeeters',
            'birthdate' => '1946-02-23',
            'email' => 'christiaan.peeters@hotmail.com',
            'postal_code' => 2400,
            'city' => 'Mol',
            'address' => 'Meyerstraat 29',
            'phone_number' => '014/41.04.18',
            'mobile_number' => '0472/27.40.89',
            'password' => Hash::make('chrisp123'),
        ]);

        User::factory()->create([
            'name' => 'Eugeen Peeters',
            'username' => 'eugeenpeeters',
            'birthdate' => '1954-02-08',
            'email' => 'gene.peeters1@telenet.be',
            'postal_code' => 2400,
            'city' => 'Mol',
            'address' => 'Vieille Montagnestraat 11',
            'phone_number' => '014/81.02.37',
            'mobile_number' => '0498/28.04.09',
            'password' => Hash::make('eugeenp123'),
        ]);

        User::factory()->create([
            'name' => 'Maurice Peeters',
            'username' => 'mauricepeeters',
            'birthdate' => '1945-03-17',
            'email' => 'mandesaintemarie@skynet.be',
            'postal_code' => 2400,
            'city' => 'Mol',
            'address' => 'Ringlaan 35',
            'phone_number' => '014/63.23.10',
            'mobile_number' => '0497/57.77.93',
            'password' => Hash::make('mauricep123'),
        ]);

        User::factory()->create([
            'name' => 'Jean Pierre Ryckmans',
            'username' => 'jeanpierreryckmans',
            'birthdate' => '1954-04-18',
            'email' => 'sylle@telenet.be',
            'postal_code' => 2490,
            'city' => 'Balen',
            'address' => 'Papenberg 21',
            'phone_number' => '011/75.93.29',
            'mobile_number' => null,
            'password' => Hash::make('jeanpierrer123'),
        ]);

        User::factory()->create([
            'name' => 'Veronique Sannen',
            'username' => 'veroniquesannen',
            'birthdate' => '1967-12-18',
            'email' => 'veronique.sannen@telenet.be',
            'postal_code' => 2490,
            'city' => 'Balen',
            'address' => 'Vuurbergenstraat 8',
            'phone_number' => '014/65.00.71',
            'mobile_number' => '0472/.25.01.39',
            'password' => Hash::make('veroniques123'),
        ]);

        User::factory()->create([
            'name' => 'Albert Schalley',
            'username' => 'albertschalley',
            'birthdate' => '1954-07-21',
            'email' => 'albert.schalley@skynet.be',
            'postal_code' => 2490,
            'city' => 'Balen',
            'address' => 'Duinstraat 15',
            'phone_number' => null,
            'mobile_number' => '0495/25.09.93',
            'password' => Hash::make('alberts123'),
        ]);

        User::factory()->create([
            'name' => 'Clem Segers',
            'username' => 'clemsegers',
            'birthdate' => '1948-12-15',
            'email' => 'clement.slegers@skynet.be',
            'postal_code' => 2400,
            'city' => 'Mol',
            'address' => 'Dalstraat 88',
            'phone_number' => null,
            'mobile_number' => '0476/71.44.70',
            'password' => Hash::make('clems123'),
        ]);

        User::factory()->create([
            'name' => 'Simonne Spruyt',
            'username' => 'simonnespruyt',
            'birthdate' => '1963-05-03',
            'email' => 'simonne.spruyt@gmail.com',
            'postal_code' => 2400,
            'city' => 'Mol',
            'address' => 'Tennislaan 1',
            'phone_number' => null,
            'mobile_number' => '0485/66.45.11',
            'password' => Hash::make('simonnes123'),
        ]);

        User::factory()->create([
            'name' => 'Dirk Stans',
            'username' => 'dirkstans',
            'birthdate' => '1963-01-29',
            'email' => 'dirk.stans@telenet.be',
            'postal_code' => 2400,
            'city' => 'Mol',
            'address' => 'Tennislaan 1',
            'phone_number' => null,
            'mobile_number' => '0485/66.45.21',
            'password' => Hash::make('dirks123'),
        ]);

        User::factory()->create([
            'name' => 'Dirk Swinnen',
            'username' => 'dirkswinnen',
            'birthdate' => '1956-09-15',
            'email' => 'dirk.swinnen4@telenet.be',
            'postal_code' => 2400,
            'city' => 'Mol',
            'address' => 'Hendrik Consciencestraat 15',
            'phone_number' => null,
            'mobile_number' => '0479/56.99.46',
            'password' => Hash::make('dirks123'),
        ]);

        User::factory()->create([
            'name' => 'Agnes Valkenborghs',
            'username' => 'agnesvalkenborghs',
            'birthdate' => '1961-01-11',
            'email' => 'agnes_valkenborghs@hotmail.com',
            'postal_code' => 2400,
            'city' => 'Mol',
            'address' => 'Grotstraat 9',
            'phone_number' => null,
            'mobile_number' => '0499/13.45.39',
            'password' => Hash::make('agnesv123'),
        ]);

        User::factory()->create([
            'name' => 'René Van Balen',
            'username' => 'renevanbalen',
            'birthdate' => '1947-03-31',
            'email' => 'renevanbalen@hotmail.com',
            'postal_code' => 2490,
            'city' => 'Balen',
            'address' => 'St. Jansstraat 131',
            'phone_number' => null,
            'mobile_number' => '0472/61.05.69',
            'password' => Hash::make('renev123'),
        ]);

        User::factory()->create([
            'name' => 'Swa Van Broekhoven',
            'username' => 'swavanbroekhoven',
            'birthdate' => '1946-03-08',
            'email' => 'swavanbroekhoven@hotmail.com',
            'postal_code' => 2490,
            'city' => 'Balen',
            'address' => 'Esdoornstraat 6',
            'phone_number' => '014/81.73.89',
            'mobile_number' => '0475/56.02.63',
            'password' => Hash::make('swav123'),
        ]);

        User::factory()->create([
            'name' => 'Victor Van Broekhoven',
            'username' => 'victorvanbroekhoven',
            'birthdate' => '1951-09-09',
            'email' => 'victorvanbroekhoven135@outlook.be',
            'postal_code' => 2490,
            'city' => 'Balen',
            'address' => 'Molenstraat 135',
            'phone_number' => null,
            'mobile_number' => '0494/81.77.12',
            'password' => Hash::make('victorv123'),
        ]);

        User::factory()->create([
            'name' => 'Herman Vandereycken',
            'username' => 'hermanvandereycken',
            'birthdate' => '1947-07-05',
            'email' => 'herman.vandereycken@gmail.com',
            'postal_code' => 2400,
            'city' => 'Mol',
            'address' => 'Heilandstraat 3',
            'phone_number' => null,
            'mobile_number' => '0498/46.39.51',
            'password' => Hash::make('hermanv123'),
        ]);

        User::factory()->create([
            'name' => 'Peter Van Dyck',
            'username' => 'petervandyck',
            'birthdate' => '1962-06-05',
            'email' => 'vandyck.goethals@gmail.com',
            'postal_code' => 2400,
            'city' => 'Mol-Wezel',
            'address' => 'Tennislaan 18',
            'phone_number' => null,
            'mobile_number' => '0475/83.93.47',
            'password' => Hash::make('peterv123'),
        ]);

        User::factory()->create([
            'name' => 'Ludo Van Olmen',
            'username' => 'ludovanolmen',
            'birthdate' => '1953-12-17',
            'email' => 'ludo.van.olmen@telenet.be',
            'postal_code' => 2490,
            'city' => 'Balen',
            'address' => 'Zwaluwstraat 15',
            'phone_number' => null,
            'mobile_number' => '0496/60.03.43',
            'password' => Hash::make('ludov123'),
        ]);

        User::factory()->create([
            'name' => 'August Van Grieken',
            'username' => 'augustvangrieken',
            'birthdate' => '1959-03-01',
            'email' => 'august.vangrieken@gmail.com',
            'postal_code' => 3920,
            'city' => 'Lommel',
            'address' => 'Haverstraat 29',
            'phone_number' => null,
            'mobile_number' => '0477/45.98.84',
            'password' => Hash::make('augustv123'),
        ]);

        User::factory()->create([
            'name' => 'Jean Van Grieken',
            'username' => 'jeanvangrieken',
            'birthdate' => '1951-11-16',
            'email' => 'jeanvg@skynet.be',
            'postal_code' => 2400,
            'city' => 'Mol',
            'address' => 'Kasteeldreef 49',
            'phone_number' => '014/81.48.58',
            'mobile_number' => '0495/62.29.21',
            'password' => Hash::make('jeanv123'),
        ]);

        User::factory()->create([
            'name' => 'Raf Van Grieken',
            'username' => 'rafvangrieken',
            'birthdate' => '1952-08-21',
            'email' => 'raf.vangrieken@telenet.be',
            'postal_code' => 2400,
            'city' => 'Mol',
            'address' => 'Maalderstraat 40',
            'phone_number' => null,
            'mobile_number' => '0475/34.10.31',
            'password' => Hash::make('rafv123'),
        ]);

        User::factory()->create([
            'name' => 'Wim Van Ouytsel',
            'username' => 'wimvanouytsel',
            'birthdate' => '1954-01-09',
            'email' => 'willem.van.ouytsel1@gmail.com',
            'postal_code' => 2490,
            'city' => 'Balen',
            'address' => 'Balen-Neetlaan 99',
            'phone_number' => null,
            'mobile_number' => '0496/92.97.71',
            'password' => Hash::make('wimv123'),
        ]);

        User::factory()->create([
            'name' => 'Roger Verhaegen',
            'username' => 'rogerverhaegen',
            'birthdate' => '1944-08-16',
            'email' => 'roger.verhaegen6@telenet.be',
            'postal_code' => 2400,
            'city' => 'Mol',
            'address' => 'Hulststraat 2',
            'phone_number' => '014/81.54.10',
            'mobile_number' => '0494/27.03.51',
            'password' => Hash::make('rogerv123'),
        ]);

        User::factory()->create([
            'name' => 'Fred Vermeulen',
            'username' => 'fredvermeulen',
            'birthdate' => '1953-12-21',
            'email' => 'noeke64@yahoo.com',
            'postal_code' => 2400,
            'city' => 'Mol',
            'address' => 'Ruiterstraat 21',
            'phone_number' => null,
            'mobile_number' => '0473/17.73.74',
            'password' => Hash::make('fredv123'),
        ]);

        User::factory()->create([
            'name' => 'Jos Verstrael',
            'username' => 'josverstrael',
            'birthdate' => '1948-08-01',
            'email' => 'ria.j@telenet.be',
            'postal_code' => 2300,
            'city' => 'Turnhout',
            'address' => 'Steenweg op Antwerpen 53B1',
            'phone_number' => null,
            'mobile_number' => '0498/53.07.71',
            'password' => Hash::make('josv123'),
        ]);
    }
}
