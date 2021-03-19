<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'product_title' => $this->product_title,
            'product_status_cd' => $this->product_status_cd,
            'product_status_label' => $this->product_status->comm2_nm,
            'product_desc' => $this->product_desc,
            'product_sku' => $this->product_sku,
            'product_barcode' => $this->product_barcode,
            'product_stock' => $this->product_stock,
            'product_price' => $this->product_price,

            'product_thumb' => $this->thumbnail,

            'category_id' => $this->category_id,
            'category_name' => $this->category ? $this->category->name : null,

            'tags' => array_filter(explode(',', $this->tags)),
            'charge_tax' => $this->charge_tax,
            'sell_out_of_stock' => $this->sell_out_of_stock,
            'has_variants' => $this->has_variants,

            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,

            'seo' => new SeoResource($this->whenLoaded('seo')),
            'variants' => ProductVariantResource::collection($this->whenLoaded('variants')),
        ];
    }
}
