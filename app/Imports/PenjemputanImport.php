<?php

namespace App\Imports;

use App\Models\Penjemputan;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PenjemputanImport implements ToModel, withHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // dd($row);
        return new Penjemputan([
            'nama_pelanggan' => $row['nama_pelanggan'],
            'alamat_pelanggan' => $row['alamat_pelanggan'],
            'tlp' => $row['tlp'],
            'petugas_penjemputan' => $row['petugas_penjemputan'],
            'status' => $row['status'],
        ]);
    }

    public function headingRow(): int {
        return 3;
    }
}
