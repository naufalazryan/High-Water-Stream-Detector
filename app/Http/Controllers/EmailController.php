<?php

namespace App\Http\Controllers;

use App\Mail\SendDataToGmail;
use App\Mail\SensorDataEmail;
use App\Models\SensorData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function sendEmail()
{
    // Ambil data dari model dan urutkan secara descending
    $sensorData = SensorData::orderBy('id', 'desc')->get();

    // Customize the recipient email address
    $recipientEmail = 'naufalazryan05@gmail.com';

    // Send the email using the Mailable
    Mail::to($recipientEmail)->send(new SensorDataEmail($sensorData));

    return view('settings.partials.script', ['sensorData' => $sensorData]);
}
}
