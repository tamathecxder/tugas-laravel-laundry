<?php

namespace App\Imports;

use App\Models\Absensi;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class AbsensiImport implements ToModel, WithHeadingRow
{
    /**
     * function model bertugas untuk mengimport data ke database dengan menyamakan dulu antara nama table dengan nama dari tiap row dalam excel
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // dd($row);
        return new Absensi([
            'nama_karyawan' => $row['nama_karyawan'],
            'tanggal_masuk' => $row['tanggal_masuk'],
            'waktu_masuk' => $row['waktu_masuk'],
            'status' => $row['status'],
        ]);
    }

    /**
     * heading row bertugas melewatkan baris baris pada excel agar data yang diambil bisa diatur untuk baris row keberapa
     * atau simplenya function headingRow ini untuk mengambil data dari baris yang di return kan
     */
    public function headingRow(): int
    {
        return 3;
    }
}
