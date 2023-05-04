<?php

namespace Database\Seeders;

use App\Models\Fishing;
use Illuminate\Database\Seeder;
use Faker\Factory;

class FishingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        for ($i = 0; $i < 100; $i++) {
            Fishing::create([
                'date' => $faker->dateTime,
                'id_user' => $faker->randomDigit
            ]);
        }
    }
}
