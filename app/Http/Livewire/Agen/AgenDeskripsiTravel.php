<?php

namespace App\Http\Livewire\Agen;

use Livewire\Component;
use App\Models\Travel;
use App\Models\Kategori;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\TravelRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AgenDeskripsiTravel extends Component
{
    public function render()
    {
        $travel = Travel::findOrFail(Auth::user()->id_travel);
        $kategori = Kategori::all();

        return view('pages.agen.deskripsi-travel', [
            'travel' => $travel,
            'kategoris' => $kategori,
        ])
        ->layout('layouts.agen.dashboard');
    }
    
    public function update(Request $request)
    {
        $id = Auth::user()->id_travel;
        $data = $request->all();
        $item = Travel::findOrFail($id);
        $data['slug'] = Str::slug($request->nama_travel);
        $item->update($data);

        return redirect()->route('agen.deskripsi.travel');
    }
}
