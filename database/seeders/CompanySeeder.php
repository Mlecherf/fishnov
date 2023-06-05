<?php

namespace Database\Seeders;

use App\Models\Company;
use Faker\Factory;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        Company::create([
            'name_company' => $faker->name,
            'name_admin_company' => $faker->name,
            'password_admin_company' => $faker->name
        ]);
    }
}
