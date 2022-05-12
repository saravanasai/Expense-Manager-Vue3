<?php

namespace App\Traits\ExpenseBook;

use Illuminate\Database\Eloquent\Builder;

trait WithUserBook
{


 /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted():void
    {
        parent::boot();

        static::addGlobalScope(function (Builder $builder) {
            $builder->where('user_id',request()->user()->id);
        });
    }

}
