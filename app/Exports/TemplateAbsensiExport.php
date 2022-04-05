<?php

namespace App\Exports;

use App\Models\Absensi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Events\BeforeImport;

class TemplateAbsensiExport implements FromCollection, WithHeadings, WithEvents, WithMapping
{
    /**
    * Interface collection untuk mengambil data dari database
    *
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Absensi::all()->take(1)->makeHidden('id');
    }

    /**
     * Interface map untuk memetakan data dari database ke dalam array secara spesifik
     *
     * @param mixed $absensi
     * @return array
     */
    public function map($absensi): array
    {
        return [
            'default_nama_karyawan',
            'default_tanggal_masuk',
            'default_waktu_masuk',
            'default_status',
        ];
    }

    /**
     * Interface headings untuk mengambil judul dari kolom
     *
     * @return array
     */
    public function headings(): array
    {
        return [
            'Nama Karyawan',
            'Tanggal Masuk',
            'Waktu Masuk',
            'Status',
        ];
    }

    /**
     * Interface events untuk mengatur event yang akan dijalankan
     *
     * @return array
     */
    function registerEvents(): array
    {
        return [
            BeforeImport::class => function(BeforeImport $event) {
                $totalRows = $event->getReader()->getTotalRow();

                if ( !empty($totalRows) ) {
                    echo $totalRows['Worksheet'];
                }
            },
            AfterSheet::class => function(AfterSheet $event) {
                $event->sheet->getColumnDimension('A')->setAutoSize(true);
                $event->sheet->getColumnDimension('B')->setAutoSize(true);
                $event->sheet->getColumnDimension('C')->setAutoSize(true);
                $event->sheet->getColumnDimension('D')->setAutoSize(true);

                $event->sheet->insertNewRowBefore(1, 2);
                $event->sheet->mergeCells('A1:D1');
                $event->sheet->setCellValue('A1', 'DATA PENGGUNAAN BARANG LAUNDRY SUMBER JAYA');
                $event->sheet->getStyle('A1')->getFont()->setBOld(true);
                $event->sheet->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $event->sheet->getStyle('A3:D' . $event->sheet->getHighestRow())->applyFromArray([
                    // Set border
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => '000000'],
                        ],
                    ],
                ]);
                $event->sheet->styleCells(
                    'A3:D3',
                    [
                        // Set border Style
                        'borders' => [
                            'outline' => [
                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                                'color' => ['argb' => '000000'],
                            ],

                        ],

                        // Set font style
                        'font' => [
                            'name'      =>  'Calibri',
                            'size'      =>  12,
                        ],

                        // Set background style
                        'fill' => [
                            'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                            'startColor' => [
                                'rgb' => 'ef5454',
                             ]
                        ],
                    ]
                );
            }
        ];
    }
}
