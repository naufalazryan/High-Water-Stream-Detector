<?php

namespace App\Http\Controllers;

use App\Models\SensorData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SensorDataController extends Controller
{
    public function index()
    {
        $data_sensor = DB::table('sensor_data')->paginate(5);
        return view('dashboard', ['data_sensor' => $data_sensor]);
    }
}
