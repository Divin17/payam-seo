<?php

namespace App\Http\Resources;

use App\Models\CountryProvider;
use App\Models\CountryUserType;
use Illuminate\Http\Resources\Json\JsonResource;

class CountryServiceResource extends JsonResource
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
            "providers" => \json_decode($this->providers),
            "providers_data" => !empty($this->providers) ? new CountryProviderCollection(CountryProvider::find(\json_decode($this->providers))) : null,
            "usertypes" => \json_decode($this->usertypes),
            "usertypes_data" => !empty($this->usertypes) ? new CountryUserTypeCollection(CountryUserType::find(\json_decode($this->usertypes))) : null,
            "name" => \json_decode($this->name),
            "description" => \json_decode($this->description),
            "icon" => $this->icon,
            "caption" => \json_decode($this->caption),
            "caption_image" => $this->caption_image,
            "setup_caption" => \json_decode($this->setup_caption),
            "setup_steps" => \json_decode($this->setup_steps),
            "metatags" => \json_decode($this->metatags),
            "status" => $this->status
        ];
    }
}
