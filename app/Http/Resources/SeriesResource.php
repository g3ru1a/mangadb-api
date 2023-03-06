<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SeriesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $review_status = ($this->review != null) ? $this->review->status : null;
        return [
            'id' => $this->id,
            'cover' => MediaResource::make($this->media),
            'names' => SeriesNameResource::collection($this->names),
            'review' => $this->when($review_status != null, $review_status),
            'deleted_at' => $this->when($this->deleted_at != null, $this->deleted_at),
        ];
    }
}
