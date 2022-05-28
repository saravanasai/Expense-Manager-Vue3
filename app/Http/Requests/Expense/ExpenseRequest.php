<?php

namespace App\Http\Requests\Expense;

use Illuminate\Foundation\Http\FormRequest;

class ExpenseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "expense_book_id"=>['required'],
            "expense_category"=>['required','exists:categories,id'],
            "expense_amount"=>['required','numeric'],
            "expense_type"=>['required','max:2'],
            "expense_note"=>['sometimes']

        ];
    }
}
