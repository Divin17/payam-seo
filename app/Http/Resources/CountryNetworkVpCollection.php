<?php

namespace App\Http\Resources;

use App\Models\CountryNetworkVp;
use Illuminate\Http\Resources\Json\ResourceCollection;

class CountryNetworkVpCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return CountryNetworkVpResource::collection($this->collection);
    }
}
