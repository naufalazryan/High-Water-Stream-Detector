<?php

namespace App\Http\Controllers;

use App\Models\DataBanjir;
use App\Models\SensorData;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BanjirController extends Controller
{
    public function index()
    {
        $banjir = SensorData::latest()->first();

        if ($banjir) {
            // Access attributes
            $nilaiBanjir = $banjir->nilai_banjir;
            $keadaanBanjir = $banjir->keadaan_banjir;

            return view('banjir', [
                'nilaiBanjir' => $nilaiBanjir,
                'keadaanBanjir' => $keadaanBanjir,
            ]);
        } else {
            return view('banjir');
        }
    }

    public function nilaibanjir()
    {
        $sensorBanjir = SensorData::latest()->value('nilai_banjir');
        return view('nilaibanjir', ['nilaiSensorBanjir' => $sensorBanjir]);
    }

    public function keadaanbanjir()
    {
        $keadaanBanjir = SensorData::latest()->value('keadaan_banjir');
        return view('keadaanbanjir', ['nilaiKeadaanBanjir' => $keadaanBanjir]);
    }

    public function diagram()
{
    // Mengambil data sensor dalam 24 jam terakhir dengan urutan descending
    $dataSensor = DB::table('db_project_building')
        ->select(DB::raw('DATE_FORMAT(created_at, "%H") as hour'), DB::raw('MAX(nilai_banjir) as max_value'), DB::raw('MIN(nilai_banjir) as min_value'))
        ->where('created_at', '>=', Carbon::now()->subDay())
        ->groupBy('hour')
        ->orderBy('hour', 'desc') // Urutan descending
        ->get();

    // Inisialisasi array untuk label dan data diagram batang
    $labels = [];
    $perubahanNilai = [];

    // Mendapatkan waktu mulai (biasanya 00:00) dan waktu saat ini
    $waktuMulai = Carbon::now()->subDay()->startOfDay();
    $waktuSaatIni = Carbon::now();

    // Loop untuk membuat label berdasarkan waktu
    while ($waktuMulai->lt($waktuSaatIni)) {
        $labels[] = $waktuMulai->format('H:00');
        $waktuMulai->addHour();
    }

    // Mendapatkan perubahan nilai banjir dalam setiap jam
    $prevValue = null;
    foreach ($dataSensor as $item) {
        if ($prevValue === null) {
            $perubahanNilai[] = 0; // Tidak ada perubahan untuk data pertama
        } else {
            $perubahanNilai[] = $item->max_value - $prevValue;
        }
        $prevValue = $item->max_value;
    }

    // Membuat data diagram batang
    $data = [
        'labels' => $labels,
        'datasets' => [
            [
                'label' => 'Perubahan Nilai Banjir',
                'data' => $perubahanNilai,
                'backgroundColor' => 'rgba(75, 192, 192, 0.2)',
                'borderColor' => 'rgba(75, 192, 192, 1)',
                'borderWidth' => 1,
            ],
        ],
    ];

    // Konfigurasi skala sumbu vertikal dan horizontal
    $options = [
        'scales' => [
            'y' => [
                'beginAtZero' => true,
                'suggestedMin' => 0,  // Nilai minimum pada sumbu vertikal
                'suggestedMax' => 60, // Nilai maksimum pada sumbu vertikal
                'stepSize' => 10, // Langkah antara label
                'ticks' => [
                    'callback' => function ($value) {
                        return $value + ' min';
                    },
                ],
            ],
            'x' => [
                'ticks' => [
                    'autoSkip' => false, // Prevent automatic skipping of labels
                    'maxRotation' => 0, // Rotate label text if needed
                    'minRotation' => 0,
                ],
            ],
        ],
    ];

    // Kirim data dan opsi ke tampilan
    return view('banjir', ['data' => $data, 'options' => $options]);
}

}
