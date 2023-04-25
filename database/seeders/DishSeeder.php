<?php

namespace Database\Seeders;

use App\Models\Dish;
use App\Models\Restaurant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dishes = [
            // ANTIPASTI
            [
                "name" => "Antipasto misto",
                "description" => "Selezione di salumi e formaggi locali",
                "price" => 12.50,
                "availability" => 1,
            ],
            [
                "name" => "Carpaccio di manzo",
                "description" => "Fettine di manzo crudo con rucola e scaglie di parmigiano",
                "price" => 9.00,
                "availability" => 0,
            ],
            [
                "name" => "Insalata di mare",
                "description" => "Misto di frutti di mare con pomodorini e olive",
                "price" => 11.00,
                "availability" => 1,
            ],
            [
                "name" => "Caprese",
                "description" => "Mozzarella di bufala con pomodori freschi e basilico",
                "price" => 8.50,
                "availability" => 0,
            ],

            // PRIMI
            [
                'name' => 'Mezze maniche alla Carbonara',
                'description' => 'Mezze maniche rigate con tuorlo d\'uovo, pecorino e guanciale',
                'price' => 12.00,
                'availability' => 0,
            ],
            [
                'name' => 'Spaghetti alle Vongole Veraci',
                'description' => 'Spaghetti con vongole veraci, pomodorino e prezzemolo',
                'price' => 16.00,
                'availability' => 1,
            ],
            [
                'name' => 'Risotto alla Milanese',
                'description' => 'Risotto qualità Carnaroli con zafferano',
                'price' => 18.00,
                'availability' => 1,
            ],
            [
                'name' => 'Orecchiette con Cime di Rapa',
                'description' => 'Orecchiette fatte in casa con cime di rapa ripassate in padella',
                'price' => 14.00,
                'availability' => 1,
            ],

            // SECONDI
            [
                'name' => 'cotoletta',
                'description' => 'pane,carne,farina,uovo',
                'price' => 7.99,
                'availability' => 0,
            ],
            [
                'name' => 'pollo ai ferri',
                'description' => 'pollo,limone,sale',
                'price' => 10.99,
                'availability' => 0,
            ],
            [
                'name' => 'spezzatino',
                'description' => 'carne,carote,farina,cipolla,sedano,vino',
                'price' => 12.99,
                'availability' => 1,
            ],
            [
                'name' => 'pesce spada arrostito',
                'description' => 'pesce spada, limone, prezzemolo',
                'price' => 15.99,
                'availability' => 1,
            ],


            // SUSHI
            [
                'name' => 'Uramaki Roll',
                'description' => 'Roll di riso con salmone all\'interno',
                'price' => 8.00,
                'availability' => 1,
            ],
            [
                'name' => 'California Roll',
                'description' => 'una forma atipica di sushi, preparato negli USA con ingredienti quali cetriolo, surimi e avocado',
                'price' => 10.00,
                'availability' => 1,
            ],
            [
                'name' => 'Sashimi di Tonno',
                'description' => 'Cruditè di tonno',
                'price' => 16.00,
                'availability' => 0,
            ],
            [
                'name' => 'Sashimi di Salmone',
                'description' => 'Cruditè di Salmone',
                'price' => 15.00,
                'availability' => 1,
            ],


            // FAST-FOOD
            [
                'name' => 'cheesburger',
                'description' => 'pane,carne,formaggio,uovo,cetrioli,cipolla',
                'price' => 4.99,
                'availability' => 0,
            ],
            [
                'name' => 'patatine fritte',
                'description' => 'patate,farina,olio',
                'price' => 1.99,
                'availability' => 1,
            ],
            [
                'name' => 'kebab',
                'description' => 'carne,carote,farina,cipolla,yogurt,patate,insalata',
                'price' => 3.99,
                'availability' => 1,
            ],
            [
                'name' => 'arancino',
                'description' => 'riso,farina,formaggio,piselli,prosciutto',
                'price' => 0.99,
                'availability' => 1,
            ],


            // PIZZE
            [
                'name' => 'Classica',
                'description' => 'Mozzarella di bufala, salsiccia, friarelli',
                'price' => 8.50,
                'availability' => 1,
            ],
            [
                'name' => 'Emiliana',
                'description' => 'pomodoro, mozzarella, prosciutto crudo, pomodoro Pachino, grana',
                'price' => 9.00,
                'availability' => 2,
            ],
            [
                'name' => 'Napoli',
                'description' => 'Pomodoro, mozzarella, acciughe',
                'price' => 6.00,
                'availability' => 1,
            ],
            [
                'name' => 'Capricciosa',
                'description' => 'pomodoro, mozzarella, prosciutto cotto, carciofi, funghi champignon, wurstel, olive nere',
                'price' => 7.00,
                'availability' => 1,
            ]
        ];

        $restaurants = Restaurant::pluck('id')->toArray();

        foreach ($restaurants as $restaurant) {
            foreach ($dishes as $dish) {
                $new_dish = new Dish();
                $new_dish->restaurant_id = $restaurant;
                $new_dish->fill($dish);
                $new_dish->slug = Str::slug($new_dish->name, '-');
                $new_dish->image = 'dishes/' . $new_dish->slug . '.jpg';
                $new_dish->save();
            }
        }
    }
}
