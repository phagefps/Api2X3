<?php

namespace App\Http\Resources\V1;
use Illuminate\Support\Facades\Route;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'id' => $this->id,
            'email' => $this->email,
            'join_date' => date_format(new \DateTime($this->created_at), 'Y-m-d'),
            'payments_api' => route('api-payments').'?client='.$this->id
        ];
    }
}
