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
            'id' => $this->id,
            'variant_value' => $this->variant_value,
            'variant_image' => $this->variant_image,
            'variant_sku' => $this->variant_sku,
            'variant_barcode' => $this->variant_barcode,
            'variant_quantity' => $this->variant_quantity,
            'variant_price' => $this->variant_price,
        ];
    }
}
