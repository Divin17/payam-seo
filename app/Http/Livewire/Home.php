<?php

namespace App\Http\Livewire;

use App\Models\Country;
use App\Models\Network;
use App\Models\Provider;
use App\Models\Service;
use App\Models\UserType;
use App\Models\ValueProposition;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Home extends Component
{
    public $locale;
    public function mount()
    {
        $this->locale = Session::get('current_locale');
    }
    public function render()
    {
        return view('livewire.home', [
            'supportedCountries' => Country::whereStatus('1')->get(),
            'upcomingCountries' => Country::whereStatus('0')->get(),
            'providers' => Provider::all(),
            'networks' => Network::all(),
            'userTypes' => UserType::all(),
            'services' => Service::all(),
            'countryName' => 'Africa',
            'valuePropositions' => ValueProposition::all(),
        ])->layoutData([
            'has_usertypes' => true,
            'is_country_route' => false,
            'route_name' => 'show_default_data',
            'locale' => $this->locale,
            'userTypes' => UserType::all(),
        ]);
    }
}
