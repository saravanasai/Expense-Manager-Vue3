<?php

namespace App\Observers\ExpenseBook;

use App\Models\ExpenseBook\ExpenseBook;
use Illuminate\Support\Facades\Cache;

class ExpenseBookObserver
{
    /**
     * Handle the ExpenseBook "created" event.
     *
     * @param  \App\Models\ExpenseBook  $expenseBook
     * @return void
     */
    public function created(ExpenseBook $expenseBook)
    {
        Cache::forget("expenseBook".request()->user()->id);
    }

    /**
     * Handle the ExpenseBook "updated" event.
     *
     * @param  \App\Models\ExpenseBook  $expenseBook
     * @return void
     */
    public function updated(ExpenseBook $expenseBook)
    {
        Cache::forget("expenseBook".request()->user()->id);
    }

    /**
     * Handle the ExpenseBook "deleted" event.
     *
     * @param  \App\Models\ExpenseBook  $expenseBook
     * @return void
     */
    public function deleted(ExpenseBook $expenseBook)
    {
        Cache::forget("expenseBook".request()->user()->id);
    }

    /**
     * Handle the ExpenseBook "restored" event.
     *
     * @param  \App\Models\ExpenseBook  $expenseBook
     * @return void
     */
    public function restored(ExpenseBook $expenseBook)
    {
        Cache::forget("expenseBook".request()->user()->id);
    }

    /**
     * Handle the ExpenseBook "force deleted" event.
     *
     * @param  \App\Models\ExpenseBook  $expenseBook
     * @return void
     */
    public function forceDeleted(ExpenseBook $expenseBook)
    {
        Cache::forget("expenseBook".request()->user()->id);
    }
}
