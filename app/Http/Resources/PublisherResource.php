<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PublisherResource extends JsonResource
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
            'name' => $this->name,
            'url' => $this->url,
            'about' => $this->about,
            'logo' => $this->when($this->media != null, MediaResource::make($this->media)),
            'review' => $this->when($review_status != null, $review_status),
            'deleted_at' => $this->when($this->deleted_at != null, $this->deleted_at),
        ];
    }
}
