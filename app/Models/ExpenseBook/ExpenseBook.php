<?php

namespace App\Models\ExpenseBook;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ExpenseBook extends Model
{
    use HasFactory;


    protected $table='expense_books';

    protected $fillable=[
        'owner_user_id',
        'book_name',
    ];

    /**
     * Get the user that owns the ExpenseBook
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'owner_user_id', 'id');
    }
}
