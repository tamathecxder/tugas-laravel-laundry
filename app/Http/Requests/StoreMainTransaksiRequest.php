<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMainTransaksiRequest extends FormRequest
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
            'tgl' => 'required|date',
            'id_member' => 'required',
            'batas_waktu' => 'required',
            'paket_id' => 'required',
            'qty' => 'required',
            'pembayaran' => 'required',
        ];
    }

    public function messages() {
        return [
            'paket_id.required' => 'Belum ada data paket yang dipilih',
            'id_member.required' => 'Belum ada data member/pelanggan yang dipilih',
        ];
    }
}
