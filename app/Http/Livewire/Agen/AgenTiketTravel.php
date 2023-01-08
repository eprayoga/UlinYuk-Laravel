<?php

namespace App\Http\Livewire\Agen;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Tiket;
use App\Http\Requests\TiketRequest;

class AgenTiketTravel extends Component
{
    public function render()
    {
        $id_travel = Auth::user()->id_travel;
        $tikets = Tiket::where('id_travel', $id_travel)->get();

        return view('pages.agen.tiket-travel.index', [
            'tikets' => $tikets
        ])
        ->layout('layouts.agen.dashboard');
    }

    public function create()
    {
        return view('pages.agen.tiket-travel.create')->layout('layouts.agen.dashboard');
    }


    public function store(TiketRequest $request) {
        $data = $request->all();
        $data['id_travel'] = Auth::user()->id_travel;

        Tiket::create($data);

        return redirect()->route('agen.tiket.travel')->with('toast_success', 'Sukses Menambah Tiket Travel');
    }

    public function edit($id)
    {
        $tiket = Tiket::findOrFail($id);

        return view('pages.agen.tiket-travel.edit', [
            'tiket' => $tiket,
        ])->layout('layouts.agen.dashboard');
    }

    public function update(TiketRequest $request, $id)
    {
        $data = $request->all();
        $item = Tiket::findOrFail($id);
        $item->update($data);

        return redirect()->route('agen.tiket.travel')->with('toast_success', 'Sukses Mengubah Tiket Travel');
    }

    public function destroy($id)
    {
        $item = Tiket::findOrFail($id);
        $item->delete();

        return redirect()->route('agen.tiket.travel')->with('toast_success', 'Sukses Mengubah Tiket Travel');
    }
}
