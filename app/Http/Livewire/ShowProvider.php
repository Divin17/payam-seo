<?php

namespace App\Http\Livewire;

use App\Models\CountryProvider;
use App\Models\CountryUserTypeProvider;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class ShowProvider extends Component
{
    public $provider;
    public $locale;

    public function mount($countryProvider)
    {
        $this->provider = $countryProvider;
        $this->locale = Session::get('current_locale');
    }
    public function render()
    {
        return view('livewire.show-provider');
    }
}
