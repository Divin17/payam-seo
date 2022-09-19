<?php

namespace App\Http\Resources;

use App\Models\CountryNetwork;
use Illuminate\Http\Resources\Json\JsonResource;

class CountryNetworkStpResource extends JsonResource
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
            "network_id" => $this->network_id,
            "network" => new CountryNetworkResource(CountryNetwork::whereId($this->network_id)->first()),
            "slug" => $this->slug,
            "title" => \json_decode($this->title),
            "description" => \json_decode($this->description),
            "image" => $this->image
        ];
    }
}
