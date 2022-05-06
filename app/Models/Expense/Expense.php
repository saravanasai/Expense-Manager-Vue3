<?php

namespace App\Models\Expense;

use App\Models\Category\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    protected $with=['Category'];

    protected $table="expenses";

    protected $fillable=[
        'user_id',
        'expense_category',
        'expense_amount',
        'expense_note',
    ];

    protected $casts=[
        'created_at' => 'date:d-m-Y',
    ];

    public function Category()
    {

        return $this->hasOne(Category::class,'id','expense_category');
    }


    public function User()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
