<?php

namespace App\Exports;

use App\Models\Penjemputan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\RegistersEventListeners;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Events\BeforeImport;

class PenjemputanExport implements FromCollection, WithHeadings, WithEvents, withMapping
{
    /**
    * Interface collection untuk mengambil data dari database
    *
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Penjemputan::all();
    }

    /**
     * Interface map untuk memetakan data dari database ke dalam array secara spesifik
     *
     * @param mixed $penjemputan
     * @return array
     */
    public function map($penjemputan): array
    {
        return [
            $penjemputan->id,
            $penjemputan->member->nama,
            $penjemputan->member->alamat,
            $penjemputan->member->tlp,
            $penjemputan->petugas_penjemputan,
            $penjemputan->status
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
            'Nama pelanggan',
            'Alamat pelanggan',
            'Tlp',
            'Petugas penjemputan',
            'Status',
        ];
    }

    /**
     * Interface events untuk mengatur event yang akan dijalankan
     *
     * @return array
     */
    public function registerEvents(): array
    {
        return [
            // Array callable, refering to a static method.
            BeforeImport::class => function (BeforeImport $event) {
                $totalRows = $event->getReader()->getTotalRows();

                if (!empty($totalRows)) {
                    echo $totalRows['Worksheet'];
                }
            },

            AfterSheet::class => function (AfterSheet $event) {
                $event->sheet->getColumnDimension('A')->setAutoSize(true);
                $event->sheet->getColumnDimension('B')->setAutoSize(true);
                $event->sheet->getColumnDimension('C')->setAutoSize(true);
                $event->sheet->getColumnDimension('D')->setAutoSize(true);
                $event->sheet->getColumnDimension('E')->setAutoSize(true);
                $event->sheet->getColumnDimension('F')->setAutoSize(true);

                $event->sheet->insertNewRowBefore(1, 2);
                $event->sheet->mergeCells('A1:F1');
                $event->sheet->setCellValue('A1', 'DATA PENJEMPUTAN LAUNDRY SUMBER JAYA');
                $event->sheet->getStyle('A1')->getFont()->setBold(true);
                $event->sheet->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $event->sheet->getStyle('A3:F' . $event->sheet->getHighestRow())->applyFromArray([
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
                        //Set border Style
                        'borders' => [
                            'outline' => [
                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                                'color' => ['argb' => '000000'],
                            ],
                        ],

                        //Set font style
                        'font' => [
                            'name'      =>  'Calibri',
                            'size'      =>  12,
                        ],

                        //Set background style
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
