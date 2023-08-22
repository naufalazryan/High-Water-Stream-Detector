<?php

namespace App\Http\Controllers;

use App\Models\DataSuhu;
use Illuminate\Http\Request;

class SuhuController extends Controller
{
    public function index(){

        $suhu = DataSuhu::select('nilai_suhu','keadaan_suhu')->get();
        return view('suhu', ['suhu' => $suhu]);
    }
}
