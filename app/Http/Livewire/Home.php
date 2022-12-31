<?php

namespace App\Http\Livewire;
use App\Models\Travel;
use App\Models\Kategori;

use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        $travels = Travel::with(['provinces', 'regencies', 'galeris', 'tikets'])->latest()->get();
        $kategoris = Kategori::get();

        return view('pages.home', [
            'travels' => $travels,
            'kategoris' => $kategoris
        ])->layout('layouts.home');
    }
}
