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
            'name'=>'saravana sai',
            'email'=>'sai@gmail.com',
            'password'=>'1412',
        ]);

        $this->call(CategorySeeder::class);
        $this->call(UserSeeder::class);

    }
}
