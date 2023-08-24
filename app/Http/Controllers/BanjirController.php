<?php

namespace App\Http\Controllers;

use App\Models\DataBanjir;
use App\Models\SensorData;
use Illuminate\Http\Request;

class BanjirController extends Controller
{
    public function index(){
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

    public function nilaibanjir(){
        $sensorBanjir = SensorData::latest()->value('nilai_banjir');
        return view('nilaibanjir', ['nilaiSensorBanjir' => $sensorBanjir]);
    }

    public function keadaanbanjir(){
        $keadaanBanjir = SensorData::latest()->value('keadaan_banjir');
        return view('keadaanbanjir', ['nilaiKeadaanBanjir' => $keadaanBanjir]);
    }
}
