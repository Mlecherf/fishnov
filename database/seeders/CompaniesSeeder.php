<?php

namespace Database\Seeders;

use App\Models\Companies;
use Faker\Factory;
use Illuminate\Database\Seeder;

class CompaniesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        Companies::create([
            'name_company' => $faker->name,
            'name_admin_company' => $faker->name,
            'password_admin_company' => $faker->name
        ]);
    }
}
