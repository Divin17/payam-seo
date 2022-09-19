<?php

namespace App\Http\Livewire;

use App\Models\Country;
use Livewire\Component;

class Contact extends Component
{
    public function render()
    {
        return view('livewire.contact', [
            'supportedCountries' => Country::whereStatus('1')->get(),
            'upcomingCountries' => Country::whereStatus('0')->get(),
        ]);
    }
}
