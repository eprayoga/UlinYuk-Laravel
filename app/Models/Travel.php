<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Travel extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_travel', 'deskripsi', 'id_kategori', 'alamat', 'provinces_id', 'regencies_id', 'districts_id', 'villages_id', 'gmap_link', 'slug', 'status',
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori', 'id');
    }

    public function provinces()
    {
        return $this->belongsTo(Province::class, 'provinces_id', 'id');
    }

    public function regencies()
    {
        return $this->belongsTo(Regency::class, 'regencies_id', 'id');
    }

    public function districts()
    {
        return $this->belongsTo(District::class, 'districts_id', 'id');
    }

    public function villages()
    {
        return $this->belongsTo(Village::class, 'villages_id', 'id');
    }

    public function galeris()
    {
        return $this->hasMany(GaleriTravel::class, 'id_travel', 'id');
    }

    public function tikets()
    {
        return $this->hasMany(Tiket::class, 'id_travel', 'id');
    }
}
