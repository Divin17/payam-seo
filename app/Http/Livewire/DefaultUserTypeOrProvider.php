<?php

namespace App\Http\Livewire;

use App\Models\Country;
use App\Models\Network;
use App\Models\Provider;
use App\Models\ProviderService;
use App\Models\ProviderStp;
use App\Models\Service;
use App\Models\UserType;
use App\Models\UserTypeStp;
use App\Models\ValueProposition;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class DefaultUserTypeOrProvider extends Component
{
    public $utype;
    public $pr;
    public $country;
    public $valuePropositions;
    public $networks;
    public $services;
    public $steps;
    public $locale;

    public function mount($slug)
    {
        $this->locale = Session::get('current_locale');

        if (!$user_type = UserType::where('slug', $slug)->first()) {
            $this->pr = Provider::where('slug', $slug)->first();
            $this->country = Country::find($this->pr->country_id);
        }
        $this->utype = $user_type;
        $this->valuePropositions = ValueProposition::all();
        $this->networks = Network::all();
        $this->services = Service::all();
        $this->steps = [];
    }

    public function render()
    {
        if (!is_null($this->utype)) {
            return view('livewire.defaults.show-user-type', [
                'providers' => Provider::all(),
                'userType' => $this->utype,
                'setup_header' => $this->utype->setup_caption
            ])->layoutData([
            'has_usertypes' => true,
            'is_country_route' => false,
            'route_name' => 'show_default_data',
            'locale' => $this->locale,
            'userTypes' => UserType::all(),
        ]);
        } elseif ($this->pr) {
            return view('livewire.defaults.show-provider', [
                'provider' => $this->pr,
                'usertypes' => UserType::all(),
                'setup_header' => $this->pr->setup_caption
            ])->layoutData([
            'has_usertypes' => true,
            'is_country_route' => false,
            'route_name' => 'show_default_data',
            'locale' => $this->locale,
            'userTypes' => UserType::all(),
        ]);
        }
        // return view('errors.404', 404);
    }
}
