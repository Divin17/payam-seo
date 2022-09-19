<?php

namespace App\Http\Livewire;

use App\Models\Country;
use App\Models\CountryUserType;
use App\Models\CountryUserTypeProvider;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class UserType extends Component
{
    public $userType;
    public $country;
    public $locale;

    public function mount(CountryUserType $userType)
    {
        $this->locale = Session::get('current_locale');
        $this->userType = $userType;
        $this->country = Country::find($userType->country_id);
    }

    public function render()
    {
        return view('livewire.user-type', [
            'countryName' => Country::find($this->userType->country_id)->name,
            'providers' => $this->country->countryProviders,
            'networks' => $this->country->countryNetworks,
            'services' => $this->country->countryUserTypeServices
        ]);
    }
}
