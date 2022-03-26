<?php

namespace App\Imports;

use App\Models\Barang;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class BarangImport implements ToModel, withHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    /**
     * function model untuk mengimport data ke model barang
     * @param array $row
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        // dd($row);
        return new Barang([
            'nama_barang' => $row['nama_barang'],
            'qty' => $row['qty'],
            'harga' => $row['harga'],
            'waktu_beli' => $row['waktu_beli'],
            'supplier' => $row['supplier'],
            'status' => $row['status']
        ]);
    }

    /**
     * function headingRow untuk mengambil data dari baris ke 3
     */
    public function headingRow(): int
    {
        return 3;
    }
}
