<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */




    public function run(): void
    {
        $types = [
            [
                'name' => 'pizzeria',
                'image' => 'pizzeria.jpg',

            ],
            [
                'name' => 'sushi',
                'image' => 'sushi.jpg',
            ],
            [
                'name' => 'braceria',
                'image' => 'braceria.jpg',
            ],
            [
                'name' => 'sea food',
                'image' => 'sea-food.jpg',
            ],
            [
                'name' => 'fast-food',
                'image' => 'fast-food.jpg',
            ],
        ];

        foreach ($types as $type) {
            $new_type = new Type();
            $new_type->name = $type['name'];
            $new_type->image = 'types/' . $type['image'];
            $new_type->save();
        }
    }
}
