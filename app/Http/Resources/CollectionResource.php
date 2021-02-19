<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CollectionResource extends JsonResource
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
            'coll_title' => $this->coll_title,
            'coll_desc' => $this->coll_desc,
            'coll_image' => $this->coll_image,

            'products' => ProductResource::collection($this->whenLoaded('products')),
        ];
    }
}
