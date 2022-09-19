<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MetatagResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => json_decode($this->id),
            'title' => json_decode($this->title),
            'slug' => $this->slug,
            'description' => json_decode($this->description),
            'keywords' => json_decode($this->keywords),
            'status' => $this->status,
        ];
    }
}
