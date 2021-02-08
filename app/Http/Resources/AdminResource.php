<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AdminResource extends JsonResource
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
            'name' => $this->name,
            'email' => $this->email,
            'role_cd' => $this->role_cd,
            'role_nm' => $this->whenLoaded('role', function () {
                return $this->role->comm2_nm;
            }),
            'created_at' => $this->created_at,
            'created_at_parsed' => $this->created_at->format('Y-m-d H:i'),
            'updated_at' => $this->updated_at,
            'updated_at_parsed' => $this->updated_at->format('Y-m-d H:i'),
        ];
    }
}
