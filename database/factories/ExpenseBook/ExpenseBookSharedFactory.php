<?php

namespace Database\Factories\ExpenseBook;

use App\Models\ExpenseBook\ExpenseBookShared;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExpenseBookSharedFactory extends Factory
{


    protected $model=ExpenseBookShared::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'to_user_id'=>rand(1,10),
            'shared_book_id'=>rand(1,10),
        ];
    }
}
