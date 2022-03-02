<?php

namespace App\Exports;

use App\Models\Paket;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\RegistersEventListeners;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Events\BeforeImport;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class PaketExport implements FromCollection, WithHeadings, WithEvents, WithMapping, WithStyles
{
    use Importable, RegistersEventListeners;

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Paket::all();
    }

    public function map($paket): array
    {
        return [
            $paket->id,
            $paket->outlet->nama,
            $paket->jenis,
            $paket->nama_paket,
            $paket->harga,
        ];
    }

    public function headings(): array
    {
        return [
            'No',
            'Nama Outlet',
            'Jenis',
            'Nama Paket',
            'Harga Paket',
        ];
    }

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
                $event->sheet->getColumnDimension('G')->setAutoSize(true);

                $event->sheet->insertNewRowBefore(1, 2);
                $event->sheet->mergeCells('A1:G1');
                $event->sheet->setCellValue('A1', 'DATA PAKET LAUNDRY SUMBER JAYA');
                $event->sheet->getStyle('A1')->getFont()->setBold(true);
                $event->sheet->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $event->sheet->getStyle('A3:E' . $event->sheet->getHighestRow())->applyFromArray([
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => '000000'],
                        ],
                    ],
                ]);
                $event->sheet->styleCells(
                    'A3:E3',
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

    public function styles(Worksheet $sheet)
    {
        // $styleArray = [
        //     'font' => [
        //         'bold' => true,
        //     ],
        //     'alignment' => [
        //         'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT,
        //     ],
        //     'borders' => [
        //         'top' => [
        //             'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
        //         ],
        //     ],
        //     'fill' => [
        //         'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_GRADIENT_LINEAR,
        //         'rotation' => 90,
        //         'setColor' => \PhpOffice\PhpSpreadsheet\Style\Color::COLOR_YELLOW,
        //     ],
        // ];

        // $sheet->getRowDimension('3');
    }
}
