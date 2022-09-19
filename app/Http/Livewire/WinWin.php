<?php

namespace App\Http\Livewire;

use App\Models\Country;
use Livewire\Component;

class WinWin extends Component
{
    public function render()
    {
        return view('livewire.win-win', [
            'supportedCountries' => Country::whereStatus('1')->get(),
            'upcomingCountries' => Country::whereStatus('0')->get(),
        ]);
    }
}
