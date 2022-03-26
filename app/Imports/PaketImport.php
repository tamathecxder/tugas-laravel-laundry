<?php

namespace App\Imports;

use App\Models\Paket;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStartRow;

class PaketImport implements ToModel, WithHeadingRow
{
    /**
     * Mendeklarasikan field terhadap kolom yang ada pada file excel
    * @param array $row
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        dd($row);
        return new Paket([
            'outlet_id' => auth()->user()->outlet_id,
            'jenis' => $row['jenis'],
            'nama_paket' => $row['nama_paket'],
            'harga' => $row['harga']
        ]);
    }

    /**
     * Menentukan baris yang akan di-skip pada file excel
     * @return int
     */
    public function headingRow(): int
    {
        return 3;
    }
}
