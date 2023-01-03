<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Pemesanan;
use App\Models\Travel;

use Midtrans\Snap;
use Midtrans\Config;


class PembayaranController extends Controller
{
    public function index($id)
    {
        $pemesanan = Pemesanan::where('id', $id)->firstOrFail();
        $travel = travel::where('id', $pemesanan->tiket->id_travel)->firstOrFail();

        return view('pages.pembayaran', [
            'travel' => $travel,
            'pemesanan' => $pemesanan
        ]);
    }

    public function process($id)
    {
        // Save user data
        $user = Auth::user();

        $pemesanan = Pemesanan::where('id', $id)->firstOrFail();
        
        $code = $pemesanan->kode;
        $total_price = $pemesanan->total_bayar;

        Pemesanan::where('id', $id)->update([
            'status' => "sudah bayar"
        ]);

        // Konfigurasi midtrans
        Config::$serverKey = config('services.midtrans.serverKey');
        Config::$isProduction = config('services.midtrans.isProduction');
        Config::$isSanitized = config('services.midtrans.isSanitized');
        Config::$is3ds = config('services.midtrans.is3ds');

        // Buat array untuk dikirim ke midtrans
        $midtrans = [
            'transaction_details' => [
                'order_id' => $code,
                'gross_amount' => $total_price
            ],
            'customer_details' => [
                'first_name' => Auth::user()->name,
                'email' => Auth::user()->email,
            ],
            'enabled_payments' => [
                'gopay', 'permata_va', 'bank_transfer', 'shopeepay', 'akulaku', 'indomaret'
            ],
            'vtweb' => []
        ];

        try {
            // Get Snap Payment Page URL
            $paymentUrl = Snap::createTransaction($midtrans)->redirect_url;
            
            // Redirect to Snap Payment Page
            return redirect($paymentUrl);
        }
        catch (Exception $e) {
            echo $e->getMessage();
        }

    }

    public function callback()
    {

    }
}
