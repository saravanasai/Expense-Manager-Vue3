<?php

namespace Database\Seeders;

use App\Models\Category\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{


    public array $category_list=[
        'Entertainment',
        'Food',
        'Fuel',
        'Fitness',
        'Social',
        'Education',
        'Electricity',
        'Medical',
        'Misc',
        'Others'
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        foreach ($this->category_list as $category) {

            Category::create(['category_name'=>$category]);
        }


    }
}
