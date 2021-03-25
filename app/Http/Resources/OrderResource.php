<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
            'order_no' => '#' . $this->id,
            'invoice_no' => $this->invoice_no,
            'total_amount' => number_format($this->total_amount),

            'customer_id' => $this->customer_id,
            'customer_name' => $this->when(!empty($this->customer_id), function () {
                $customer = $this->customer;
                $name = $customer->first_name . ' ' . $customer->last_name;
                $name = trim($name);

                return $name;
            }),

            'order_status_cd' => $this->order_status_cd,
            'order_status_label' => $this->order_status->comm2_nm,

            'payment_status_cd' => $this->payment_status_cd,
            'payment_status_label' => $this->payment_status->comm2_nm,

            'fulfillment_status_cd' => $this->fulfillment_status_cd,
            'fulfillment_status_label' => $this->fulfillment_status->comm2_nm,

            'email' => $this->email,
            'phone_number' => $this->phone_number,

            'notes' => $this->notes,
            'tags' => array_filter(explode(',', $this->tags)),

            'products' => OrderProductResource::collection($this->whenLoaded('products')),

            'created_at' => $this->created_at->format('Y-m-d H:i'),
        ];
    }
}
