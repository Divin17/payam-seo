<?php

namespace App\Http\Livewire;

use App\Models\Country as ModelsCountry;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Country extends Component
{
    public $country;
    // public $meta_description;
    // public $meta_keywords;
    public $locale;
    public function mount(ModelsCountry $country)
    {
        $this->locale = Session::get('current_locale');
        $this->country = $country;
        // dd($this->locale);
        // $this->meta_title = json_decode($country->metatags)->title->en;
        // $this->meta_description = json_decode($country->metatags)->description->en;
        // $this->meta_keywords = json_decode($country->metatags)->keywords;
    }

    public function render()
    {
        return view('livewire.country', [
            'userTypes' => $this->country->countryUserTypes,
            'providers' => $this->country->countryProviders,
            'networks' => $this->country->countryNetworks,
            'services' =>  $this->country->countryServices,
            'valuePropositions' => $this->country->countryValuePropositions
        ])->layoutData([
            'has_usertypes' => true,
            'is_country_route' => true,
            'route_name' => 'show_country_data',
            'locale' => $this->locale,
            'userTypes' => $this->country->countryUserTypes,
            'country' => $this->country,
        ]);
    }
}
