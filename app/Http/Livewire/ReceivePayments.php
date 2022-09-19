<?php

namespace App\Http\Livewire;

use App\Models\Country;
use Livewire\Component;
class ReceivePayments extends Component
{
    public function render()
    {
        return view('livewire.receive-payments', [
            'supportedCountries' => Country::whereStatus('1')->get(),
            'upcomingCountries' => Country::whereStatus('0')->get(),
        ]);
    }
}
