<?php

namespace App\Http\Resources;

use App\Models\CountryService;
use App\Models\Service;
use Illuminate\Http\Resources\Json\JsonResource;

class ServiceVpResource extends JsonResource
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
            "service_id" => $this->service_id,
            "service" => new ServiceResource(Service::whereId($this->service_id)->first()),
            "slug" => $this->slug,
            "title" => \json_decode($this->title),
            "description" => \json_decode($this->description),
            "image" => $this->image,
        ];
    }
}
