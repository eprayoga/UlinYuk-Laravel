<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PemesananDBRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'tanggal_kunjungan' => 'required|date', 
            'total_bayar' => 'required|integer', 
            'jumlah_tiket' => 'required|integer',  
            'status' => 'required|string', 
            'nama_pengunjung' => 'required|string', 
            'email_pengunjung' => 'required|string', 
            'nomor_pengunjung' => 'required|string', 
        ];
    }
}
