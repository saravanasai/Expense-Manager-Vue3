<?php

namespace Database\Seeders;

use App\Models\ExpenseBook\ExpenseBookShared;
use Illuminate\Database\Seeder;

class ExpenseBookSharedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ExpenseBookShared::factory()->count(5)->create();
    }
}
