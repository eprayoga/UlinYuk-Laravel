<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TravelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama_travel' => 'Situ Cangkuan',
            'deskripsi' => 'Candi Cangkuang',
            'id_kategori' => 2,
            'alamat' => "Leles, Garut",
            'provinces_id' => 1,
            'regencies_id' => 1,
            'districts_id' => 1,
            'villages_id' => 1,
            'slug' => 'candi-cangkuan',
            'status' => 1,
        ];
    }
}
