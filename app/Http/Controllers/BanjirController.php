<?php

namespace App\Http\Controllers;

use App\Models\DataBanjir;
use App\Models\SensorData;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BanjirController extends Controller
{


    public function nilaibanjir()
    {
        $sensorBanjir = SensorData::orderBy('id', 'DESC')->value('nilai_banjir');
        return view('nilaibanjir', ['nilaiSensorBanjir' => $sensorBanjir]);
    }

    public function keadaanbanjir()
    {
        $keadaanBanjir = SensorData::orderBy('id', 'DESC')->value('keadaan_banjir');
        return view('keadaanbanjir', ['nilaiKeadaanBanjir' => $keadaanBanjir]);
    }

    
    public function diagram()
    {
        // Mengambil semua data sensor dari database
        $data = SensorData::orderBy('waktu', 'desc')->get();

        // Memisahkan data menjadi labels (waktu) dan values (nilai_banjir)
        $labels = [];
        $values = [];

        $previousHour = null; // Inisialisasi jam sebelumnya

        foreach ($data as $item) {
            // Memisahkan waktu menjadi jam
            $waktu = strtotime($item->waktu);
            $formatJam = date('H:00', $waktu);

            // Jika jam saat ini berbeda dari jam sebelumnya
            if ($formatJam !== $previousHour) {
                // Tambahkan label waktu saat ini ke dalam $labels
                $labels[] = $formatJam;
                $values[] = $item->nilai_banjir;
            }

            // Simpan jam saat ini sebagai jam sebelumnya
            $previousHour = $formatJam;
        }

        // Kirim data ke view 'banjir.blade.php'
        return view('banjir', compact('labels', 'values'));
    }


    public function getLatestData()
    {
        // Mengambil data sensor terbaru dari database
        $latestData = SensorData::orderBy('waktu', 'DESC')->first();

        // Menyusun data yang akan dikirimkan sebagai respons JSON
        $responseData = [
            'nilai_banjir' => $latestData->nilai_banjir,
            'waktu' => $latestData->waktu,
        ];

        // Mengirim data sebagai respons JSON
        return response()->json($responseData);
    }
}