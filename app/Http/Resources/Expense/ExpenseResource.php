<?php

namespace App\Http\Resources\Expense;

use App\Http\Resources\Category\CategoryResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ExpenseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'expense_id'=>$this->id,
            'expense_amount'=>$this->expense_amount,
            'expense_type'=>$this->expense_type,
            'expense_note'=>$this->expense_note,
            'expense_category'=>CategoryResource::make($this->whenLoaded('Category')),
            'expense_created_at'=>$this->created_at->format('d-M-Y'),
        ];
    }
}
