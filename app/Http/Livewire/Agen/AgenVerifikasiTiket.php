<?php

namespace App\Http\Livewire\Agen;

use Livewire\Component;

class AgenVerifikasiTiket extends Component
{
    public function render()
    {
        return view('pages.agen.verifikasi-tiket.index')
        ->layout('layouts.agen.dashboard');
    }
}
