<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DraftResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'draft_no' => '#D' . $this->id,
            'created_at' => $this->created_at->format('Y-m-d H:i'),
            'customer_id' => $this->customer_id,
            'customer_name' => $this->when(!empty($this->customer_id), function () {
                $customer = $this->customer;
                $name = $customer->first_name . ' ' . $customer->last_name;
                $name = trim($name);

                return $name;
            }),
            'status_cd' => $this->status_cd,
            'status_label' => $this->status->comm2_nm,
            'total_amount' => number_format($this->total_amount)
        ];
    }
}
