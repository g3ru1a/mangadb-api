<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReviewResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array|Arrayable|\JsonSerializable
     */
    public function toArray($request): array|\JsonSerializable|Arrayable
    {
        return [
            'submitter' => UserResource::make($this->submitter),
            'reviewer' => $this->when($this->reviewer != null,
                UserResource::make($this->reviewer)),
            'status' => $this->status,
            'comments' => count($this->comments)
        ];
    }
}
