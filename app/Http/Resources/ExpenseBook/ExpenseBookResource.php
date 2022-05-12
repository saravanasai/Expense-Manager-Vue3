<?php

namespace App\Http\Resources\ExpenseBook;

use App\Http\Resources\User\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ExpenseBookResource extends JsonResource
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
            "id"=>$this->id,
            "book"=>$this->book_name,
            "user"=>UserResource::make($this->whenLoaded('user'))
        ];
    }
}
