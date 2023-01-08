<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Travel;
use App\Models\Kategori;

class Category extends Component
{
    public function index($id)
    {
        $isKategori = Kategori::where('slug', $id)->first();
        $travels = Travel::with(['provinces', 'regencies', 'galeris', 'tikets'])->where('id_kategori', $isKategori->id)->latest()->get();
        $kategoris = Kategori::get();

        return view('pages.category', [
            'travels' => $travels,
            'kategoris' => $kategoris,
            'isKategori' => $isKategori
        ]);
    }
}
