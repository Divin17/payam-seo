<?php

namespace App\Http\Resources;

use App\Models\CountryUserTypeProviderStp;
use Illuminate\Http\Resources\Json\ResourceCollection;

class CountryUserTypeProviderStpCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return CountryUserTypeProviderStpResource::collection($this->collection);
    }
}
