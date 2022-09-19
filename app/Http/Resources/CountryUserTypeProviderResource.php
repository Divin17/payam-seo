<?php

namespace App\Http\Resources;

use App\Models\CountryUserType;
use Illuminate\Http\Resources\Json\JsonResource;

class CountryUserTypeProviderResource extends JsonResource
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
            "id" => $this->id,
            "slug" => $this->slug,
            "country_id" => $this->country_id,
            "usertype_id" => $this->usertype_id,
            "usertype" => new CountryUserTypeResource(CountryUserType::whereId($this->usertype_id)->first()),
            "name" => \json_decode($this->name),
            "description" => \json_decode($this->description),
            "image" => $this->image,
            "caption" => \json_decode($this->caption),
            "caption_image" => $this->caption_image,
            "setup_caption" => \json_decode($this->setup_caption),
            "setup_steps" => \json_decode($this->setup_steps),
            "metatags" => \json_decode($this->metatags),
            "status" => $this->status
        ];
    }
}
