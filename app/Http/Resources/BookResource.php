<?php

namespace App\Http\Resources;

use App\Http\Controllers\MediaController;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        $review_status = ($this->review != null) ? $this->review->status : null;
        return [
            "id" => $this->id,
            "cover" => MediaResource::make($this->media),
            "name" => $this->name,
            "summary" => $this->summary,
            "number" => $this->number,
            "isbn_10" => $this->isbn_10,
            "isbn_13" => $this->isbn_13,
            "page_count" => $this->page_count,
            "release_date" => $this->release_date,
            "series_type" => SeriesTypeResource::make($this->series_type),
            "publisher" => PublisherResource::make($this->publisher),
            "language" => LanguageResource::make($this->language),
            "binding" => BindingResource::make($this->binding),
            'review' => $this->when($review_status != null, $review_status),
            'deleted_at' => $this->when($this->deleted_at != null, $this->deleted_at),
        ];
    }
}
