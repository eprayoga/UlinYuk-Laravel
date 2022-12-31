<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Travel;

class DetailController extends Controller
{
    public function index($id)
    {
        $travel = Travel::with(['provinces', 'regencies', 'districts', 'villages', 'galeris', 'tikets'])->where('slug', $id)->firstOrFail();

        return view('pages.detail', [
            'travel' => $travel
        ]);
    }
}
