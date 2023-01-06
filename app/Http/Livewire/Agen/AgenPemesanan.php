<?php

namespace App\Http\Livewire\Agen;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

use App\Models\Pemesanan;
use App\Models\Travel;

class AgenPemesanan extends Component
{
    public function render()
    {
        $id_travel = Auth::user()->id_travel;
        $pemesanans = Pemesanan::where('id_travel', $id_travel)->get();

        return view('pages.agen.pemesanan.index', [
            'pemesanans' => $pemesanans
        ])
        ->layout('layouts.agen.dashboard');
    }

    public function detail($id) {
        $pemesanan = Pemesanan::findOrFail($id);
        $travel = travel::where('id', $pemesanan->tiket->id_travel)->firstOrFail();

        return view('pages.agen.pemesanan.detail', [
            'pemesanan' => $pemesanan,
            'travel' => $travel
        ]);
    }

    public function updateStatus($id) {
        $pemesanan = Pemesanan::findOrFail($id);
        
        if ($pemesanan->status == "sukses") {
            $status = "proses";
            $status_tiket = null;
        } else {
            $status = "sukses";
            $status_tiket = "belum digunakan";
        }

        $pemesanan->update([
            'status' => $status,
            'status_tiket' => $status_tiket
        ]);

        return redirect()->route('agen.pemesanan');
    }
}
