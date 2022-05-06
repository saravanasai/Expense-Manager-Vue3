<?php

namespace Database\Seeders;

use App\Models\Expense\Expense;
use App\Models\User;
use Database\Factories\Expense\ExpenseFactory;
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
        User::factory()->count(10)
            ->create()
            ->each(function ($user) {

                $user->Expense()
                    ->saveMany(Expense::factory()
                        ->count(rand(1, 5))
                        ->make());
            });
    }
}
