<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggal_kunjungan', 'tanggal_pemesanan', 'total_bayar', 'jumlah_tiket', 'id_pemesan', 'kode',
        'id_tiket', 'status', 'nama_pengunjung', 'email_pengunjung', 'nomor_pengunjung', 'permintaan',
    ];

    public function tiket()
    {
        return $this->belongsTo(Tiket::class, 'id_tiket', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_pemesan', 'id');
    }
}
