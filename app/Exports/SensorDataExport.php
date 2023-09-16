<?php

namespace App\Exports;

use App\Models\SensorData;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize; // Import ShouldAutoSize
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class SensorDataExport implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents // Implement ShouldAutoSize and WithEvents
{
    protected $sensorData;

    public function __construct($sensorData)
    {
        $this->sensorData = $sensorData;
    }

    public function collection()
    {
        return $this->sensorData;
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nilai Banjir',
            'Keadaan Banjir',
            'Nilai Suhu',
            'Keadaan Suhu',
            'Nilai Kelembapan',
            'Keadaan Kelembapan',
            'Nilai Hujan',
            'Keadaan Hujan',
            'Waktu',
            'Created At',
            'Updated At'
            // Add more headings as needed for your SensorData model.
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                // Styling options for the header row
                $event->sheet->getDelegate()->getStyle('A1:D1')->applyFromArray([
                    'font' => [
                        'bold' => true,
                    ],
                    'fill' => [
                        'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                        'color' => ['argb' => 'FFFF00'], // Yellow background
                    ],
                ]);

                // Auto-adjust column widths for all columns
                $event->sheet->getDelegate()->getColumnDimension('A')->setAutoSize(true);
                $event->sheet->getDelegate()->getColumnDimension('B')->setAutoSize(true);
                $event->sheet->getDelegate()->getColumnDimension('C')->setAutoSize(true);
                $event->sheet->getDelegate()->getColumnDimension('D')->setAutoSize(true);
            },
        ];
    }
}
