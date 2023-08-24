<?php

namespace App\Http\Controllers;

use App\Models\SensorData;
use Illuminate\Http\Request;

class SuhuController extends Controller
{
    public function index(){

        $suhu = SensorData::latest()->first();
        

        if ($suhu) {
            $nilaiSuhu = $suhu->nilai_suhu;
            $keadaanSuhu = $suhu->keadaan_suhu;
        
            return view('suhu', [
                'nilaiSuhu' => $nilaiSuhu,
                'keadaanSuhu' => $keadaanSuhu,
            ]);
        } else {
            return view('suhu'); 
        }
    }

    public function nilaisuhu(){
        $sensorSuhu = SensorData::latest()->value('nilai_suhu');
        return view('nilaisuhu', ['nilaiSensorSuhu' => $sensorSuhu]);
    }

    public function keadaansuhu(){
        $keadaanSuhu = SensorData::latest()->value('keadaan_suhu');
        return view('keadaansuhu', ['nilaiKeadaanSuhu' => $keadaanSuhu]);
    }
}
