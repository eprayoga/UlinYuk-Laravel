<?php

namespace App\Http\Livewire\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Livewire\Component;
use App\Models\Kategori;

class AdminDataKategori extends Component
{
    public function render()
    {
        $kategoris = Kategori::get();

        return view('pages.admin.kategori.index', [
            'kategoris' => $kategoris,
        ])
        ->layout('layouts.admin.dashboard');
    }

    public function create()
    {
        return view('pages.admin.kategori.create')->layout('layouts.admin.dashboard');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->nama_kategori);

        Kategori::create($data);
        return redirect()->route('admin.data.kategori');
    }

    public function edit($id)
    {
        $kategori = Kategori::findOrFail($id);

        return view('pages.admin.kategori.edit', [
            'kategori' => $kategori
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $item = Kategori::findOrFail($id);
        $data['slug'] = Str::slug($request->nama_kategori);
        $item->update($data);

        return redirect()->route('admin.data.kategori');
    }

    public function destroy($id)
    {
        $item = Kategori::findOrFail($id);
        $item->delete();

        return redirect()->route('admin.data.kategori');
    }
}
