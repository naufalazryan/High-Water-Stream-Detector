<?php

namespace App\Http\Controllers;

use App\Models\DataBanjir;
use Illuminate\Http\Request;

class BanjirController extends Controller
{
    public function index(){
        $banjir = DataBanjir::select('nilai_banjir','keadaan_banjir')->get();
        return view('banjir', ['banjir' => $banjir]);

    }
}
