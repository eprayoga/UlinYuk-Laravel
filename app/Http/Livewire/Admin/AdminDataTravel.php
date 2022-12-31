<?php

namespace App\Http\Livewire\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Livewire\Component;
use App\Models\Travel;
use App\Models\Kategori;
use App\Http\Requests\Admin\TravelRequest;

class AdminDataTravel extends Component
{
    public function render()
    {
        $travels = Travel::with(['kategori', 'provinces'])->latest()->get();

        return view('pages.admin.travel.index', [
            'travels' => $travels,
        ])
        ->layout('layouts.admin.dashboard');
    }

    public function create()
    {
        $kategori = Kategori::all();
        return view('pages.admin.travel.create', [
            'kategoris' => $kategori
        ])->layout('layouts.admin.dashboard');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(TravelRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->nama_travel);

        Travel::create($data);
        return redirect()->route('admin.data.travel');
    }

    public function edit($id)
    {
        $travel = Travel::findOrFail($id);
        $kategoris = Kategori::all();

        return view('pages.admin.travel.edit', [
            'travel' => $travel,
            'kategoris' => $kategoris
        ]);
    }

    public function update(TravelRequest $request, $id)
    {
        $data = $request->all();
        $item = Travel::findOrFail($id);
        $data['slug'] = Str::slug($request->nama_travel);
        $item->update($data);

        return redirect()->route('admin.data.travel');
    }

    public function destroy($id)
    {
        $item = Travel::findOrFail($id);
        $item->delete();

        return redirect()->route('admin.data.travel');
    }
}
