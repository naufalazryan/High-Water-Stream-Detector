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

        $perPage = 5;
        $orderByColumn = '';
        $orderByDirection = 'desc';

        $data_sensor = DB::table('db_project_building')->paginate(5);
        return view('dashboard', ['data_sensor' => $data_sensor]);
    }

    public function insertData(Request $request)
    {
        // Validate and sanitize input if necessary

        $insertData = [
            'nilai_banjir' => $request->input('nilai_banjir'),
            'keadaan_banjir' => $request->input('keadaan_banjir'),
            'nilai_suhu' => $request->input('nilai_suhu'),
            'keadaan_suhu' => $request->input('keadaan_suhu'),
            'nilai_kelembapan' => $request->input('nilai_kelembapan'),
            'keadaan_kelembapan' => $request->input('keadaan_kelembapan'),
            'nilai_hujan' => $request->input('nilai_hujan'),
            'keadaan_hujan' => $request->input('keadaan_hujan'),
        ];

        // Insert data into the database
        DB::table('db_project_building')->insert($insertData);

        // Handle success or failure...

        return response()->json(['message' => 'Data inserted successfully']);
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
