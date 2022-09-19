<?php

namespace App\Http\Resources;

use App\Models\CountryProvider;
use App\Models\CountryUserType;
use App\Models\CountryUserTypeProvider;
use Illuminate\Http\Resources\Json\JsonResource;

class CountryUserTypeProviderStpResource extends JsonResource
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
            "country_id" => $this->country_id,
            "usertype_id" => $this->usertype_id,
            "usertype" => new CountryUserTypeResource(CountryUserType::whereId($this->usertype_id)->first()),
            "provider_id" => $this->provider_id,
            "provider" => new CountryUserTypeProviderResource(CountryUserTypeProvider::whereId($this->provider_id)->first()),
            "slug" => $this->slug,
            "title" => \json_decode($this->title),
            "description" => \json_decode($this->description),
            "image" => $this->image,
        ];
    }
}
