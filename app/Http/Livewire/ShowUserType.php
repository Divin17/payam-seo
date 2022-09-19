<?php

namespace App\Http\Livewire;

use App\Models\Network;
use App\Models\Provider;
use App\Models\Service;
use App\Models\UserType;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class ShowUserType extends Component
{
    public $userType;
    public $locale;

    public function mount($userType)
    {
        $this->locale = Session::get('current_locale');
        $data = UserType::where('slug', $userType)->first();
        if (!is_null($data)) {
            $this->userType = $data;
        } else {
            $data2 = Provider::where('slug', $userType)->first();
        }
    }

    public function render()
    {
        return view('livewire.show-user-type', [
            'services' => Service::all(),
            'providers' => Provider::all(),
            'networks' => Network::all(),
        ]);
    }
}
