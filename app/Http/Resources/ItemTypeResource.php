<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ItemTypeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array|Arrayable|\JsonSerializable
     */
    public function toArray($request): array|\JsonSerializable|Arrayable
    {
        $review_status = ($this->review != null) ? $this->review->status : null;
        return [
            'id' => $this->id,
            'name' => $this->name,
            'review' => $this->when($review_status != null, $review_status),
        ];
    }
}
