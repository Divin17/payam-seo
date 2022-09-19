<?php

namespace App\Http\Livewire;

use App\Models\Country;
use App\Models\ValueProposition;
use Livewire\Component;

class Pricing extends Component
{
    public function render()
    {
        return view('livewire.pricing', [
            'supportedCountries' => Country::whereStatus('1')->get(),
            'upcomingCountries' => Country::whereStatus('0')->get(),
            'valuePropositions' => ValueProposition::all()
        ]);
    }
}
