<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'first_name'=>'admin',
            'last_name'=>'fishnov',
            'email'=>'admin.fishnov@gmail.com',
            'password'=>'password',
            'type'=>'trawler',
            'is_admin'=>True
        ]);
        $this->call([
            FishingSeeder::class
        ]);
    }
}
