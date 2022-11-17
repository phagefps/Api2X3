<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class PaymentResource extends JsonResource
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
            'id' => $this->uuid,
            'payment_date' => ($this->status == "paid") ? date_format(new \DateTime($this->payment_date), 'Y-m-d') : null,
            'expires_at' => date_format(new \DateTime($this->expires_at), 'Y-m-d'),
            'status' => $this->status,
            'client_id' => $this->client_id,
            'clp_usd' => $this->clp_usd,
        ];
    }
}
