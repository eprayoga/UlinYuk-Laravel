<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PemesananRequest;
use App\Http\Requests\PemesananDBRequest;

use App\Models\Travel;
use App\Models\Tiket;
use App\Models\Pemesanan;

class PemesananController extends Controller
{
    public function index(PemesananRequest $request, $id)
    {
        $dataPesan = $request->all();
        $tiket = Tiket::where('id', $id)->firstOrFail();
        $travel = Travel::with(['galeris'])->where('id', $tiket->id_travel)->firstOrFail();

        return view('pages.pemesanan', [
            'travel' => $travel,
            'tiket' => $tiket,
            'dataPesan' => $dataPesan,
        ]);
    }

    public function store(PemesananDBRequest $request, $id) {
        $data = $request->all();
        $data['id_pemesan'] = Auth::user()->id;
        $data['id_tiket'] = $id;
        $data['tanggal_pemesanan'] = date("Y-m-d");
        $data['kode'] = 'ULINYUK-' . mt_rand(000000,999999);

        Pemesanan::create($data);

        $result = Pemesanan::firstOrFail();

        return redirect()->route('pembayaran', $result->id);
    }
}
