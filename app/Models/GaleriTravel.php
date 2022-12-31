<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GaleriTravel extends Model
{
    use HasFactory;

    protected $fillable = [
        'foto', 'id_travel'
    ];

    public function travel()
    {
        return $this->belongsTo(Travel::class, 'id_travel', 'id');
    }
}
