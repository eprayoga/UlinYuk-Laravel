<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

use App\Models\Admin;
use App\Models\Travel;

class AdminDataAgen extends Component
{
    public function render()
    {
        $agens = Admin::with(['travel'])->where('level', 'agen')->get();

        return view('pages.admin.agen-travel.index', [
            "agens" => $agens
        ])->layout('layouts.admin.dashboard');
    }

    public function create() {
        $travels = Travel::get();

        return view('pages.admin.agen-travel.create', [
            'travels' => $travels
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['level'] = 'agen';
        $data['password'] = Hash::make($data['password']);

        Admin::create($data);
        return redirect()->route('admin.data.agen');
    }
}
