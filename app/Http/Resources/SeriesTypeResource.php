<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SeriesTypeResource extends JsonResource
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
            'series' => SeriesResource::make($this->series),
            'type' => ItemTypeResource::make($this->type),
            'status' => StatusResource::make($this->status),
            'staff' => StaffResource::collection($this->staff),
            'review' => $this->when($review_status != null, $review_status),
            'deleted_at' => $this->when($this->deleted_at != null, $this->deleted_at)
        ];
    }
}
