<?php

namespace Database\Seeders;

use App\Models\Expense\Expense;
use App\Models\ExpenseBook\ExpenseBook;
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

        $dispatcherExpense = Expense::getEventDispatcher();
        $dispatcherExpenseBook = ExpenseBook::getEventDispatcher();
        // Remove Dispatcher
        Expense::unsetEventDispatcher();
        ExpenseBook::unsetEventDispatcher();

        // do stuff here
        User::factory()->count(10)
            ->create()
            ->each(function ($user) {

                $user->ExpenseBook()
                    ->saveMany(ExpenseBook::factory()
                        ->count(rand(1, 4))->make());

                $user->Expense()
                    ->saveMany(Expense::factory()
                        ->count(rand(1, 5))
                        ->make());
            });

        // Re-add Dispatcher
        Expense::setEventDispatcher($dispatcherExpense);
        ExpenseBook::setEventDispatcher($dispatcherExpenseBook);
    }
}
