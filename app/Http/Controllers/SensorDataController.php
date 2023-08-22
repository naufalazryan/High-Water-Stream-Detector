<?php

namespace App\Http\Controllers;

use App\Models\SensorData;
use Illuminate\Http\Request;

class SensorDataController extends Controller
{
    public function index()
    {
        $data_sensor = SensorData::all();
        return view('dashboard', ['data_sensor' => $data_sensor]);
    }
}
