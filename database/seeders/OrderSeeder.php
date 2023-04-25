<?php

namespace Database\Seeders;

use App\Models\Dish;
use App\Models\Order;
use App\Models\Restaurant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator;
use Illuminate\Database\Eloquent\Relations\Pivot;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Generator $faker): void
    {
        $restaurants_id = Restaurant::pluck('id')->toArray();

        foreach ($restaurants_id as $restaurant) {

            for ($i = 0; $i < 10; $i++) {
                $dish_id = Dish::where('restaurant_id', $restaurant)->pluck('id')->toArray();
                $order = new Order();
                $order->first_name = $faker->firstName();
                $order->last_name = $faker->lastName();
                $order->email = $faker->email();
                $order->address = $faker->streetAddress();
                $order->phone = $faker->phoneNumber();
                $order->payment_status = $faker->boolean();
                $order->total_price = $faker->randomFloat(2, 5, 500);
                $order->delivery_time = $faker->time('H:i');
                $order->save();
                $dishes = [];
                foreach ($dish_id as $dish) {
                    if (rand(0, 1)) {
                        $dishes[] = $dish;
                    }
                }

                // $dish->orders()->attach($order->id, ['quantity' => ]);
                $order->dishes()->attach($dishes, ['quantity' => $faker->randomDigitNotNull()]);
            }
        }
    }
}
