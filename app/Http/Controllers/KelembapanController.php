<?php

namespace App\Http\Controllers;

use App\Models\DataKelembapan;
use Illuminate\Http\Request;

class KelembapanController extends Controller
{
    public function index(){

        $kelembapan = DataKelembapan::select('nilai_kelembapan','keadaan_kelembapan')->get();
        return view('kelembapan', ['kelembapan' => $kelembapan]);
    }
}
