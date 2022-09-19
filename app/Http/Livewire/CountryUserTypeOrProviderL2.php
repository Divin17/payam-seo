<?php

namespace App\Http\Livewire;

use App\Models\Country;
use App\Models\CountryProvider;
use App\Models\CountryProviderUserType;
use App\Models\CountryUserType;
use App\Models\CountryUserTypeProvider;
use App\Models\CountryUserTypeProviderService;
use App\Models\CountryProviderUserTypeService;
use Illuminate\Support\Facades\Session;

use Livewire\Component;

class CountryUserTypeOrProviderL2 extends Component
{
    public $utype;
    public $pr;
    public $country;
    public $locale;

    // public $services;

    public $showUserType;
    public $showProvider;
    public $valuePropositions;
    public $steps;
    public $caption;

    public function mount($slug1, $slug2)
    {
        $this->locale = Session::get('current_locale');

        if (!$user_type = CountryUserType::where('slug', $slug1)->first()) {
            $this->pr = $prov = CountryProvider::where('slug', $slug1)->first();
            $this->utype = $user_type = CountryUserType::where('slug', $slug2)->first();
            $this->showUserType = true;
            $this->country = Country::find($this->pr->country_id);
            // $this->services = CountryProviderUserTypeService::where('usertype_id', $this->utype->id)->where('provider_id', $this->pr->id)->where('country_id', $this->utype->country_id)->get();
        } else {
            $this->utype = $user_type;
            $this->showProvider = true;
            $this->pr = CountryProvider::where('slug', $slug2)->first();

            // dd($user_type);
            $this->country = Country::find($user_type->country_id);
            $this->caption = CountryUsertypeProvider::where('country_id', $this->country->id)->where('usertype_id', $this->utype->id)->where('slug', $slug2)->first()->caption;
            // dd($this->caption);
        }

        $this->services = CountryUserTypeProviderService::where('usertype_id', $this->utype->id)->where('provider_id', $this->pr->id)->where('country_id', $this->utype->country_id)->get();
        $this->valuePropositions = $this->country->countryUserTypeProviderVps()->where('usertype_id', $this->utype->id)->where('provider_id', $this->pr->id)->where('country_id', $this->utype->country_id)->get();
        $this->steps = $this->country->countryUserTypeProviderStps()->where('usertype_id', $this->utype->id)->where('provider_id', $this->pr->id)->get();
    }

    public function render()
    {
        if ($this->showUserType) {
            return view('livewire.country.countryProviderUsertype', [
                'userType' => $this->utype,
                'provider' => $this->pr,
                'usertype' => $this->utype,
                'supportedCountries' => Country::whereStatus('1')->get(),
                'upcomingCountries' => Country::whereStatus('0')->get(),
                'setup_header' => $this->utype->setup_caption
            ])->layoutData([
            'has_usertypes' => true,
            'is_country_route' => true,
            'route_name' => 'show_country_data',
            'locale' => $this->locale,
            'userTypes' => $this->country->countryUserTypes,
            'country' => $this->country,
        ]);
        } elseif ($this->showProvider) {
            return view('livewire.country.countryUsertypeProvider', [
                'networks' => $this->country->countryNetworks,
                'provider' => $this->pr,
                'usertype' => $this->utype,
                'supportedCountries' => Country::whereStatus('1')->get(),
                'upcomingCountries' => Country::whereStatus('0')->get(),
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
