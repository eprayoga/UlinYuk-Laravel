<?php

namespace App\Http\Livewire\Agen;

use Livewire\Component;
use App\Models\Travel;
use App\Models\Pemesanan;
use Illuminate\Support\Facades\Auth;

use RealRashid\SweetAlert\Facades\Alert;

class AgenDashboard extends Component
{
    public function render()
    {
        $id_travel = Auth::user()->id_travel;
        $travel = Travel::findOrFail(Auth::user()->id_travel);

        $pemesanans = Pemesanan::where('id_travel', $id_travel)->get();
        $total_pendapatan = Pemesanan::where([
            ['id_travel', '=', $id_travel],
            ['status', '=', 'sukses']
        ])->sum('total_bayar');

        return view('pages.agen.dashboard', [
            'travel' => $travel,
            'pemesanans' => $pemesanans,
            'total_pendapatan' => $total_pendapatan
        ])
        ->layout('layouts.agen.dashboard');
    }
}
