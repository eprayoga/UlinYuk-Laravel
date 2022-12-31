<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tiket extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_tiket', 'deskripsi', 'harga', 'id_travel',
    ];

    public function travel()
    {
        return $this->belongsTo(Travel::class, 'id_travel', 'id');
    }
}
