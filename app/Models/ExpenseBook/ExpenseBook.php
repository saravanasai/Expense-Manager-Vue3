<?php

namespace App\Models\ExpenseBook;

use App\Models\User;
use App\Traits\ExpenseBook\WithUserBook;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ExpenseBook extends Model
{
    use HasFactory;
    use WithUserBook;


    protected $with=['user'];

    protected $table = 'expense_books';

    protected $fillable = [
        'user_id',
        'book_name',
    ];

    /**
     * Get the user that owns the ExpenseBook
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

}
