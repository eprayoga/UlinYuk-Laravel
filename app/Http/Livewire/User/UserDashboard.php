<?php

namespace App\Http\Livewire\User;

use Illuminate\Support\Facades\Auth;
use App\Models\Pemesanan;

use Livewire\Component;

class UserDashboard extends Component
{
    public function render()
    {
        $user_id = Auth::user()->id;
        $pemesanan = Pemesanan::where('id_pemesan', $user_id);

        $total_transaksi = $pemesanan->get()->count();
        $total_pembelian = $pemesanan->where('status', 'sukses')->sum('total_bayar');
        $total_tiket = $pemesanan->where('status', 'sukses')->get()->count();

        $transaksi_proses = $total_transaksi - $total_tiket;

        return view('pages.user.dashboard',  [
            'total_transaksi' => $total_transaksi,
            'total_pembelian' => $total_pembelian,
            'total_tiket' => $total_tiket,
            'transaksi_proses' => $transaksi_proses,
        ])->layout('layouts.user.dashboard');
    }

    public function myTicket() {
        $user_id = Auth::user()->id;
        $allTickets = Pemesanan::with(['travel', 'tiket'])->where([
            ['id_pemesan', '=', $user_id],
            ['status', '=', 'sukses']
        ])->latest()->get();

        return view('pages.user.myticket', [
            'allTickets' => $allTickets
        ]);
    }

    public function myTicketDetail($id) {
        $user_id = Auth::user()->id;
        $ticket = Pemesanan::with(['travel', 'tiket'])->where([
            ['id_pemesan', '=', $user_id],
            ['status', '=', 'sukses'],
            ['id', '=', $id]
        ])->firstOrFail();

        return view('pages.user.myticket-detail', [
            'ticket' => $ticket
        ]);
    }

    public function transaction() {
        $user_id = Auth::user()->id;
        $transactions = Pemesanan::with(['travel', 'tiket'])->where('id_pemesan', '=', $user_id)->latest()->get();

        return view('pages.user.transaction', [
            'transactions' => $transactions
        ]);
    }

    public function transactionDetail($id) {
        $user_id = Auth::user()->id;
        $transaction = Pemesanan::with(['travel', 'tiket'])->where([['id_pemesan', '=', $user_id], ['id', '=', $id]])->firstOrFail();

        return view('pages.user.transaction-detail', [
            'transaction' => $transaction
        ]);
    }

}
