<?php

namespace App\Http\Livewire\Agen;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\GaleriTravelRequest;
use Illuminate\Http\Request;
use App\Models\GaleriTravel;

class AgenGaleriTravel extends Component
{
    public function render()
    {
        $id_travel = Auth::user()->id_travel;
        $galeris = GaleriTravel::where('id_travel', $id_travel)->get();

        return view('pages.agen.galeri-travel.index', [
            'galeris' => $galeris
        ])
        ->layout('layouts.agen.dashboard');
    }

    public function add() {
        return view('pages.agen.galeri-travel.create')->layout('layouts.agen.dashboard');
    }

    public function store(GaleriTravelRequest $request) {
        $data = $request->all();
        $data['foto'] = $request->file('foto')->store('assets/travel','public');
        $data['id_travel'] = Auth::user()->id_travel;

        GaleriTravel::create($data);

        return redirect()->route('agen.galeri.travel');
    }

    public function destroy($id) {
        $item = GaleriTravel::findOrFail($id);
        $item->delete();

        return redirect()->route('agen.galeri.travel');
    }

}
