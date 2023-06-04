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
            'phone_number' => '014810237',
            'mobile_number' => '0498638149',
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
            'phone_number' => '014650071',
            'mobile_number' => '0475285944',
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
            'mobile_number' => '0498611758',
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
            'phone_number' => '014812411',
            'mobile_number' => '0473856177',
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
            'mobile_number' => '0485682059',
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
            'phone_number' => '014810217',
            'mobile_number' => '0498642274',
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
            'mobile_number' => '0477310191',
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
            'mobile_number' => '0473986422',
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
            'phone_number' => '011540938',
            'mobile_number' => '0495530938',
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
            'mobile_number' => '0488278343',
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
            'phone_number' => '014321589',
            'mobile_number' => '0498528615',
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
            'phone_number' => '014812453',
            'mobile_number' => '0498571720',
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
            'mobile_number' => '0472975820',
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
            'phone_number' => '014812079',
            'mobile_number' => '0477970397',
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
            'mobile_number' => '0476753407',
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
            'phone_number' => '011551056',
            'mobile_number' => '0486668845',
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
            'mobile_number' => '0473853741',
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
            'phone_number' => '0610970796',
            'mobile_number' => '0495619507',
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
            'phone_number' => '011759329',
            'mobile_number' => '0499726015',
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
            'mobile_number' => '0497791288',
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
            'phone_number' => '014812619',
            'mobile_number' => '0497651918',
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
            'phone_number' => '014810750',
            'mobile_number' => '0473123722',
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
            'phone_number' => '014810894',
            'mobile_number' => '0472424768',
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
            'mobile_number' => '0476633176',
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
            'phone_number' => '011341615',
            'mobile_number' => '0497241500',
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
            'mobile_number' => '0496855489',
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
            'phone_number' => '014410418',
            'mobile_number' => '0472274089',
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
            'phone_number' => '014810237',
            'mobile_number' => '0498280409',
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
            'phone_number' => '014632310',
            'mobile_number' => '0497577793',
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
            'phone_number' => '011759329',
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
            'phone_number' => '014650071',
            'mobile_number' => '0472250139',
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
            'mobile_number' => '0495250993',
            'password' => Hash::make('alberts123'),
            'is_admin' => true,
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
            'mobile_number' => '0476714470',
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
            'mobile_number' => '0485664511',
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
            'mobile_number' => '0485664521',
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
            'mobile_number' => '0479569946',
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
            'mobile_number' => '0499134539',
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
            'mobile_number' => '0472610569',
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
            'phone_number' => '014817389',
            'mobile_number' => '0475560263',
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
            'mobile_number' => '0494817712',
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
            'mobile_number' => '0498463951',
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
            'mobile_number' => '0475839347',
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
            'mobile_number' => '0496600343',
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
            'mobile_number' => '0477459884',
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
            'phone_number' => '014814858',
            'mobile_number' => '0495622921',
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
            'mobile_number' => '0475341031',
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
            'mobile_number' => '0496929771',
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
            'phone_number' => '014815410',
            'mobile_number' => '0494270351',
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
            'mobile_number' => '0473177374',
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
            'mobile_number' => '0498530771',
            'password' => Hash::make('josv123'),
        ]);
    }
}
