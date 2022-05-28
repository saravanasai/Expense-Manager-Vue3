<?php

namespace Database\Factories\Expense;

use App\Models\Expense\Expense;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExpenseFactory extends Factory
{

    protected $model=Expense::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'expense_book_id'=>rand(1,2),
            'expense_category'=>rand(1,10),
            'expense_amount'=>rand(10,10000),
            'expense_type'=>rand(1,2),
            'expense_note'=>$this->faker->sentence(),
        ];
    }
}
