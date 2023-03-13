<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\MissingValue;

class StaffResource extends JsonResource
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
        $role = $this->whenPivotLoaded('series_type_staff', function() {return $this->pivot->role;});
        return [
            'id' => $this->id,
            'name' => $this->name,
            'native_name' => $this->when($this->native_name != null, $this->native_name),
            'role' => $this->when($role, $role),
            'about' => $this->when($this->about != null, $this->about),
            'age' => $this->when($this->age != null, $this->age),
            'gender' => $this->when($this->gender != null, $this->gender),
            'origin' => $this->when($this->origin != null, $this->origin),
            'started_on' => $this->when($this->started_on != null, $this->started_on),
            'stopped_on' => $this->when($this->stopped_on != null, $this->stopped_on),
            'picture' => $this->when($this->media != null, MediaResource::make($this->media)),
            'review' => $this->when($review_status != null, $review_status),
            'deleted_at' => $this->when($this->deleted_at != null, $this->deleted_at),
        ];
    }
}
