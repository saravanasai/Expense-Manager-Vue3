<?php

namespace App\Models\ExpenseBook;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpenseBookShared extends Model
{
    use HasFactory;

    protected $table='expense_book_shareds';


    protected $fillable=[
        'to_user_id',
        'shared_book_id',
    ];


    
}
