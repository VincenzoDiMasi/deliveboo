<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Generator $faker): void
    {
        for ($i = 0; $i < 12; $i++) {
            $user = new User();

            $user->name = $faker->name();
            $user->email = $faker->email();
            $user->password = bcrypt('admin');

            $user->save();
        }
    }
}
