<?php

namespace App\Http\Controllers;

use App\Models\DataSuhu;
use Illuminate\Http\Request;

class SuhuController extends Controller
{
    public function index(){

        $suhu = DataSuhu::all();
        return view('suhu', compact('suhu'));
    }
}
