<?php

namespace App\Exports;

use App\Models\Barang;
use Maatwebsite\Excel\Events\BeforeImport;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Events\AfterSheet;

class BarangExport implements FromCollection, withHeadings, withEvents, withMapping
{
    /**
    * Interface collection untuk mengambil data dari database
    *
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Barang::all();
    }

    /**
     * Interface map untuk memetakan data dari database ke dalam array secara spesifik
     *
     * @param mixed $barang
     * @return array
     */
    public function map($barang): array
    {
        return [
            $barang->id,
            $barang->nama_barang,
            $barang->qty,
            $barang->harga,
            $barang->waktu_beli,
            $barang->supplier,
            $barang->status,
            $barang->waktu_update_status
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
            'No.',
            'Nama barang',
            'QTY',
            'Harga',
            'Waktu beli',
            'Supplier',
            'Status barang',
            'Waktu update status',
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
                $event->sheet->getColumnDimension('E')->setAutoSize(true);
                $event->sheet->getColumnDimension('F')->setAutoSize(true);
                $event->sheet->getColumnDimension('G')->setAutoSize(true);
                $event->sheet->getColumnDimension('H')->setAutoSize(true);

                $event->sheet->insertNewRowBefore(1, 2);
                $event->sheet->mergeCells('A1:H1');
                $event->sheet->setCellValue('A1', 'DATA PENGGUNAAN BARANG LAUNDRY SUMBER JAYA');
                $event->sheet->getStyle('A1')->getFont()->setBOld(true);
                $event->sheet->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $event->sheet->getStyle('A3:H' . $event->sheet->getHighestRow())->applyFromArray([
                    // Set border
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => '000000'],
                        ],
                    ],
                ]);
                $event->sheet->styleCells(
                    'A3:H3',
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
