<?php

namespace App\Http\Controllers;

use App\Models\SensorData;
use Illuminate\Http\Request;

class KelembapanController extends Controller
{
    public function index(){

        $kelembapan = SensorData::latest()->first();

        if ($kelembapan) {
            // Access attributes
            $nilaiKelembapan = $kelembapan->nilai_kelembapan;
            $keadaanKelembapan = $kelembapan->keadaan_kelembapan;
        
            return view('kelembapan', [
                'nilaiKelembapan' => $nilaiKelembapan,
                'keadaanKelembapan' => $keadaanKelembapan,
            ]);
        } else {
            return view('kelembapan'); 
        }   
    }

    public function nilaikelembapan(){
        $nilaikelembapan = SensorData::latest()->value('nilai_kelembapan');
        return view('nilaikelembapan', ['nilaiSensorKelembapan' => $nilaikelembapan]);
    }
    public function keadaankelembapan(){
        $keadaanKelembapan = SensorData::latest()->value('keadaan_kelembapan');
        return view('keadaankelembapan', ['nilaiKeadaanKelembapan' => $keadaanKelembapan]);
    }
}
