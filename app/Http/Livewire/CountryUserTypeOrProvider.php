<?php

namespace App\Http\Livewire;

use App\Models\CountryNetwork;
use App\Models\CountryProvider;
use App\Models\Country;
use App\Models\CountryUserType;
use Livewire\Component;
use App\Http\Resources\CountryUserTypeServiceCollection;
use Illuminate\Support\Facades\Session;

class CountryUserTypeOrProvider extends Component
{
    public $utype;
    public $pr;
    public $country;
    public $locale;

    public function mount($slug)
    {
        $this->locale = Session::get('current_locale');

        if (!$user_type = CountryUserType::where('slug', $slug)->first()) {
            $this->pr = $prov = CountryProvider::where('slug', $slug)->first();
            // dd($this->pr);
            $this->country = Country::find($prov->country_id);
        } else {
            $this->utype = $user_type;
            // dd($user_type);
            $this->country = Country::find($user_type->country_id);
        }
    }
    public function render()
    {
        if (!is_null($this->utype)) {
            return view('livewire.country.user-type', [
                'services' => new CountryUserTypeServiceCollection(
                    $this->country->countryUserTypeServices()->where('usertype_id', $this->utype->id)->get()
                ),
                'country_providers' => $this->country->countryUserTypeProviders()->where('usertype_id', $this->utype->id)->get(),
                'networks' => $this->country->countryNetworks,
                'userType' => $this->utype,
                'country' => $this->country,
                'valuePropositions' => $this->country->countryUserTypeVps()->where('usertype_id', $this->utype->id)->get(),
                'steps' => $this->country->countryUserTypeStps()->where('usertype_id', $this->utype->id)->get(),
                'setup_header' => $this->utype->setup_caption
            ])->layoutData([
            'has_usertypes' => true,
            'is_country_route' => true,
            'route_name' => 'show_country_data',
            'locale' => $this->locale,
            'userTypes' => $this->country->countryUserTypes,
            'country' => $this->country,
        ]);
        } elseif ($this->pr) {
            return view('livewire.country.show-provider', [
                'services' => $this->country->countryProviderServices()->where('provider_id', $this->pr->id)->get(),
                'networks' => $this->country->countryNetworks,
                'provider' => $this->pr,
                'country' => $this->country,
                'usertypes' => $this->country->CountryProviderUserTypes()->where('provider_id', $this->pr->id)->get(),
                'valuePropositions' => $this->country->countryProviderVps()->where('provider_id', $this->pr->id)->get(),
                'steps' => $this->country->countryProviderStps()->where('provider_id', $this->pr->id)->get(),
                'setup_header' => $this->pr->setup_caption
            ])->layoutData([
            'has_usertypes' => true,
            'is_country_route' => true,
            'route_name' => 'show_country_data',
            'locale' => $this->locale,
            'userTypes' => $this->country->countryUserTypes,
            'country' => $this->country,
        ]);
        }
        // return view('errors.404', 404);
    }
}
