<?php

namespace Database\Seeders;

use App\Models\Restaurant;
use App\Models\Type;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $restaurants = [
            [
                'name' => 'Ristorante La Pergola',
                'address' => 'Via della Pergola, 1',
                'p_iva' => '01234567890',
                'phone' => '+39 055 1234567',
            ],
            [
                'name' => 'Trattoria da Mario',
                'address' => 'Via Rosina, 2',
                'p_iva' => '01234567891',
                'phone' => '+39 02 1234567',
            ],
            [
                'name' => 'Osteria del Vecchio Borgo',
                'address' => 'Via del Borgo, 3',
                'p_iva' => '01234567892',
                'phone' => '+39 06 1234567',
            ],
            [
                'name' => 'Angelo e diavolo',
                'address' => 'Via Francesco Gaeta, 4',
                'p_iva' => '01234567893',
                'phone' => '+39 055 1243567',
            ],
            [
                'name' => 'Lo spuntino',
                'address' => 'Piazza della repubblica, 5',
                'p_iva' => '01234567894',
                'phone' => '+39 02 1254367',
            ],
            [
                'name' => 'La botte e il tagliere',
                'address' => 'Via Parrillo, 6',
                'p_iva' => '01234567895',
                'phone' => '+39 06 1234576',
            ],
            [
                'name' => 'Dimora Nannina',
                'address' => 'Via Tora di Piccoli, 7',
                'p_iva' => '01234567801',
                'phone' => '+39 055 2134567',
            ],
            [
                'name' => 'Il campetto',
                'address' => 'Via Sant\'angelo, 8',
                'p_iva' => '01234567802',
                'phone' => '+39 02 3214567',
            ],
            [
                'name' => 'La brocca di tizio',
                'address' => 'Via Mazzini, 9',
                'p_iva' => '01234567803',
                'phone' => '+39 06 3454567',
            ],
            [
                'name' => 'Pizzeria O Sole Mio',
                'address' => 'Via Gennaro Esposito, 10',
                'p_iva' => '01234567877',
                'phone' => '+39 055 1236767',
            ],
            [
                'name' => 'Sushi Bar Mikado',
                'address' => 'Via Akira Toryiama, 11',
                'p_iva' => '01234127893',
                'phone' => '+39 055 1299567',
            ],
            [

                'name' => 'Trattoria da Nonna Elena',
                'address' => 'Via Nilde Iotti, 12',
                'p_iva' => '01234561193',
                'phone' => '+39 055 1234467',
            ],
        ];

        $types = Type::pluck('id')->all();
        $users = User::pluck('id')->all();

        $i = 0;
        foreach ($restaurants as $restaurant) {
            $new_restaurant = new Restaurant();
            $new_restaurant->user_id = $users[$i];
            $new_restaurant->fill($restaurant);
            $new_restaurant->slug = Str::slug($new_restaurant->name, '-');
            $new_restaurant->save();
            $i++;
            $restaurant_types = [];

            do {
                foreach ($types as $type) {
                    if (rand(0, 1)) $restaurant_types[] = $type;
                }
            } while (!count($restaurant_types));

            $new_restaurant->types()->attach($restaurant_types);
        }
    }
}
