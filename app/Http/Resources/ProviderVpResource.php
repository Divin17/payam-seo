<?php

namespace App\Http\Resources;

use App\Models\CountryProvider;
use App\Models\Provider;
use Illuminate\Http\Resources\Json\JsonResource;

class ProviderVpResource extends JsonResource
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
            "provider_id" => $this->provider_id,
            "provider" => new ProviderResource(Provider::whereId($this->provider_id)->first()),
            "slug" => $this->slug,
            "title" => \json_decode($this->title),
            "description" => \json_decode($this->description),
            "image" => $this->image,
        ];
    }
}
