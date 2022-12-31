<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class TravelRequest extends FormRequest
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
        'nama_travel' => 'required|max:255',
         'deskripsi' => 'required',
         'id_kategori' => 'required|exists:kategoris,id',
         'alamat' => 'required',
         'provinces_id' => 'required',
         'regencies_id' => 'required',
         'districts_id' => 'required',
         'villages_id' => 'required',
         'gmap_link' => 'nullable',
         'status' => 'required',
        ];
    }
}
