<?php

namespace App\Exports;

use App\Models\Barang;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Events\BeforeImport;

class TemplateBarangExport implements FromCollection, WithHeadings, WithEvents, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // return dari model Barang hanya data pertama saja
        return Barang::all()->take(1)->makeHidden('id');
    }

    public function map($barang): array
    {
        return [
            'nama_barang',
            'qty',
            'harga',
            'waktu_beli',
            'supplier',
            'status',
        ];
    }

    public function headings(): array
    {
        return [
            'Nama barang',
            'QTY',
            'Harga',
            'Waktu beli',
            'Supplier',
            'Status barang',
        ];
    }

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

                $event->sheet->insertNewRowBefore(1, 2);
                $event->sheet->mergeCells('A1:F1');
                $event->sheet->setCellValue('A1', 'DATA PENGGUNAAN BARANG LAUNDRY SUMBER JAYA');
                $event->sheet->getStyle('A1')->getFont()->setBOld(true);
                $event->sheet->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $event->sheet->getStyle('A3:F' . $event->sheet->getHighestRow())->applyFromArray([
                    // Set border
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => '000000'],
                        ],
                    ],
                ]);
                $event->sheet->styleCells(
                    'A3:F3',
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
