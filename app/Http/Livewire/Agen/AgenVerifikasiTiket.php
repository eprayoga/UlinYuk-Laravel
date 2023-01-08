<?php

namespace App\Http\Livewire\Agen;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Models\Pemesanan;

class AgenVerifikasiTiket extends Component
{
    public function render()
    {
        return view('pages.agen.verifikasi-tiket.index')
        ->layout('layouts.agen.dashboard');
    }

    public function verification(Request $request) {
        $data = $request->all();
        $kode = 'ULINYUK-'. $data['kode'];
        $id_travel = Auth::user()->id_travel;
        
        $pemesanan = Pemesanan::where([
            ['id_travel', '=', $id_travel],
            ['kode', '=', $kode],
        ])->first();

        if ($pemesanan) {
            if($pemesanan->status_tiket == "belum digunakan") {
                $pemesanan->update(['status_tiket' => 'digunakan']);

                return redirect()->route('agen.verifikasi.tiket')->with('success', 'Sukses Memverifikasi Tiket');
            } else {
                return back()->with('toast_error', 'Tikat Sudah Digunakan');
            }
        } else {
            return back()->with('toast_error', 'Tikat Tidak Ditemukan');
        }
    }
    
}
