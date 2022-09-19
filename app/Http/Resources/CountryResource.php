<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CountryResource extends JsonResource
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
            'id' => $this->id,
            'slug' => $this->slug,
            'flag' => $this->flag,
            'name' => $this->name,
            'status' => $this->status,
            'published' => $this->published,
            'currency' => $this->currency,
            'title' => json_decode($this->title),
            'description' => json_decode($this->description),
            'metatags' => json_decode($this->metatags),
        ];
    }
}
