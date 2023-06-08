<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'first_name'=>'admin',
            'last_name'=>'fishnov',
            'email'=>'admin.fishnov@gmail.com',
            'password'=>'$2y$10$O5bc5LYIx5lcJ84Q9EtKHeqWaNIi7.1AKucffw/MbRqGMwqw/7CUu',
            'type'=>'trawler',
            'is_admin'=>True
        ]);
        $this->call([
            FishingSeeder::class,
            DetailedFishingSeeder::class
        ]);
    }
}
