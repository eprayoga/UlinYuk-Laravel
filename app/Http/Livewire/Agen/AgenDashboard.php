<?php

namespace App\Http\Livewire\Agen;

use Livewire\Component;
use App\Models\Travel;
use Illuminate\Support\Facades\Auth;

class AgenDashboard extends Component
{
    public function render()
    {
        $travel = Travel::findOrFail(Auth::user()->id_travel);

        return view('pages.agen.dashboard', [
            'travel' => $travel,
        ])
        ->layout('layouts.agen.dashboard');
    }
}
