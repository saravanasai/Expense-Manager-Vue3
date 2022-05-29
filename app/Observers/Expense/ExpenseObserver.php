<?php

namespace App\Observers\Expense;

use App\Models\Expense\Expense;
use Illuminate\Support\Facades\Cache;

class ExpenseObserver
{
    /**
     * Handle the Expense "created" event.
     *
     * @param  \App\Models\Expense  $expense
     * @return void
     */
    public function created(Expense $expense)
    {
        Cache::forget("expenseList".$expense->expense_book_id);
        Cache::flush();
    }

    /**
     * Handle the Expense "updated" event.
     *
     * @param  \App\Models\Expense  $expense
     * @return void
     */
    public function updated(Expense $expense)
    {
        Cache::forget("expenseList".$expense->expense_book_id);
        Cache::flush();
    }

    /**
     * Handle the Expense "deleted" event.
     *
     * @param  \App\Models\Expense  $expense
     * @return void
     */
    public function deleted(Expense $expense)
    {
        Cache::flush();
        Cache::forget("expenseList".$expense->expense_book_id);
    }

    /**
     * Handle the Expense "restored" event.
     *
     * @param  \App\Models\Expense  $expense
     * @return void
     */
    public function restored(Expense $expense)
    {
        Cache::forget("expenseList".$expense->expense_book_id);
        Cache::flush();
    }

    /**
     * Handle the Expense "force deleted" event.
     *
     * @param  \App\Models\Expense  $expense
     * @return void
     */
    public function forceDeleted(Expense $expense)
    {
        Cache::forget("expenseList".$expense->expense_book_id);
        Cache::flush();
    }
}
