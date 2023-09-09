<?php

namespace App\Http\Controllers;

use App\Models\Sensor;
use App\Models\SensorData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class SensorDataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $orderBy = 'id'; // Default sorting column
        $sortDirection = 'asc'; // Default sorting direction
        $perPage = 10; // Records per page

        if (request()->has('orderBy')) {
            $orderBy = request('orderBy');
        }

        if (request()->has('sortDirection')) {
            $sortDirection = request('sortDirection');
        }

        $data_sensor = SensorData::orderBy($orderBy, $sortDirection)
            ->paginate($perPage);

        return view('dashboard', compact('data_sensor'));
    }

    public function insertData(Request $request)
    {
        // Assuming you are getting the data from the request
        $data = $request->all();

        // Create a new instance of the DbProjectBuilding model and set its attributes
        $sensor_data = new SensorData();
        $sensor_data->nilai_banjir = $data['nilai_banjir'];
        $sensor_data->keadaan_banjir = $data['keadaan_banjir'];
        $sensor_data->nilai_suhu = $data['nilai_suhu'];
        $sensor_data->keadaan_suhu = $data['keadaan_suhu'];
        $sensor_data->nilai_kelembapan = $data['nilai_kelembapan'];
        $sensor_data->keadaan_kelembapan = $data['keadaan_kelembapan'];
        $sensor_data->nilai_hujan = $data['nilai_hujan'];
        $sensor_data->keadaan_hujan = $data['keadaan_hujan'];

        // Save the record to the database
        $sensor_data->save();

        // Handle success or errors here
    }


    public function search(Request $request)
    {


        $output = "";
        $sensor_data = SensorData::where(
            'id',
            'like',
            '%' . $request->search . '%'
        )->get();

        foreach ($sensor_data as $row) {
            $output .=
                '<tr class="text-black text-center hover:bg-gray-100">
                    <td class="px-6 py-4">' . $row->id . '</td>
                    <td class="px-6 py-4">' . $row->nilai_banjir . '</td>
                    <td class="px-6 py-4">' . $row->keadaan_banjir . '</td>
                    <td class="px-6 py-4">' . $row->nilai_suhu . '</td>
                    <td class="px-6 py-4">' . $row->keadaan_suhu . '</td>
                    <td class="px-6 py-4">' . $row->nilai_kelembapan . '</td>
                    <td class="px-6 py-4">' . $row->keadaan_kelembapan . '</td>
                    <td class="px-6 py-4">' . $row->nilai_hujan . '</td>
                    <td class="px-6 py-4">' . $row->keadaan_hujan . '</td>
                    <td class="px-6 py-4">' . $row->waktu . '</td>
                </tr>';
        }

        return response($output);
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SensorData $sensorData, $id)
    {
        $data = SensorData::find($id);
        $data->delete();

        return response()->json(['success' => true, 'tr' => 'tr_' . $id]);
    }
}
