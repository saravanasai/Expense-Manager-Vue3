<?php

namespace Database\Factories\ExpenseBook;

use App\Models\ExpenseBook\ExpenseBook;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExpenseBookFactory extends Factory
{


    protected $model=ExpenseBook::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'book_name'=>$this->faker->userName(),
            'book_description'=>$this->faker->sentence(),
        ];
    }
}
