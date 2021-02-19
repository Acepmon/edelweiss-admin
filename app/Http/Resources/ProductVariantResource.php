<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductVariantResource extends JsonResource
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
            'variant_type' => $this->variant_type,
            'variant_title' => $this->variant_title,
            'variant_sku' => $this->variant_sku,
            'variant_stock' => $this->variant_stock,
            'variant_price' => $this->variant_price,
        ];
    }
}
