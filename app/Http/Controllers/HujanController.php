<?php

namespace App\Http\Controllers;

use App\Models\DataHujan;
use App\Models\SensorData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HujanController extends Controller
{
    public function index()
    {
        $hujan = DB::table('db_project_building')->select('nilai_hujan', 'keadaan_hujan', DB::raw('CASE WHEN keadaan_hujan = 0 THEN "Tidak Hujan" WHEN keadaan_hujan  = 1 THEN
        "Hujan" ELSE "Unknown" END AS keadaan_hujan'))->get();
        return view('hujan', ['hujan' => $hujan]);
    }

    public function nilaihujan(){
        $nilaihujan = SensorData::latest()->value('nilai_hujan');
        return view('nilaihujan', ['nilaiSensorHujan' => $nilaihujan]);
    }

    public function keadaanhujan()
    {
        $keadaanHujan = SensorData::latest()->value('keadaan_hujan');
        return view('keadaanhujan', ['nilaiKeadaanHujan' => $keadaanHujan]);
    }

    
}
