<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Country;
use App\Models\CountryProvider;
use App\Models\CountryProviderUserType;
use App\Models\CountryUserType;
use App\Models\CountryUserTypeProvider;
use App\Models\CountryUserTypeProviderService;
use App\Models\CountryProviderUserTypeService;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Session;

class ShowService extends Component
{
    public $utype;
    public $pr;
    public $country;
    public $service_slug;
    public $requested_service;
    public $services_data;
    public $locale;

    public function mount($slug1, $slug2, $service)
    {
        $this->service_slug = $service;
        $this->locale = Session::get('current_locale');
        // dd($this->services_data);
        if (!$user_type = CountryUserType::where('slug', $slug1)->first()) {
            $this->pr = $prov = CountryProvider::where('slug', $slug1)->first();
            $this->utype = $user_type = CountryUserType::where('slug', $slug2)->first();
            $this->country = Country::find($prov->country_id);

        // dd($other_services);
        } else {
            $this->utype = $user_type;
            $this->pr = CountryProvider::where('slug', $slug2)->first();

            // dd($user_type);
            $this->country = Country::find($user_type->country_id);
        }
        $this->requested_service = $r_data = CountryUserTypeProviderService::where('usertype_id', $this->utype->id)->where('provider_id', $this->pr->id)->where('slug', $service)->first();
        // dd($this->requested_service);
        $other_services = CountryUserTypeProviderService::where('slug', '!=', $service)->where('usertype_id', $this->utype->id)->where('provider_id', $this->pr->id)->get();

        // $this->services_data = Arr::except($other_services, $this->requested_service->slug);
    }

    public function render()
    {
        return view('livewire.country.show-service', [
            'networks' => $this->country->countryNetworks,
            'valuePropositions' => $this->country->countryUserTypeProviderVps()->where('usertype_id', $this->utype->id)->where('provider_id', $this->pr->id)->get(),
            'steps' => $this->country->countryUserTypeProviderServiceStps()->where('service_id', $this->requested_service->id)->get(),
            'service_data' => CountryUserTypeProviderService::where('usertype_id', $this->utype->id)->where('provider_id', $this->pr->id)->where('slug', $this->service_slug)->first(),
            'other_services' => CountryUserTypeProviderService::where('slug', '!=', $this->service_slug)->where('usertype_id', $this->utype->id)->where('provider_id', $this->pr->id)->get()
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
