<?php

namespace App\Http\Controllers;

use App\Models\DataHujan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HujanController extends Controller
{
    public function index(){
        $hujan = DB::table('sensor_data')->select('nilai_hujan','keadaan_hujan', DB::raw('CASE WHEN keadaan_hujan = 0 THEN "Tidak Hujan" WHEN keadaan_hujan  = 1 THEN
        "Hujan" ELSE "Unknown" END AS keadaan_hujan'))->get();
        // $hujan = DataHujan::select('nilai_hujan','keadaan_hujan')->get();
        return view('hujan', ['hujan' => $hujan]);
    }
}
