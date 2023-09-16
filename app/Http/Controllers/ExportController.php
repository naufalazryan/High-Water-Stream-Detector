<?php

namespace App\Http\Controllers;

use App\Exports\SensorDataExport;
use App\Models\SensorData;
use Maatwebsite\Excel\Facades\Excel;

use Illuminate\Http\Request;

class ExportController extends Controller
{

    public function export()
    {
        $sensorData = SensorData::all(); // Modify this query as needed to fetch the data you want to export.
        return Excel::download(new SensorDataExport($sensorData), 'exported_sensor_data.csv');
    }
}
