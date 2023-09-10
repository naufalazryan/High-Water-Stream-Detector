<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class PythonFileController extends Controller
{
    public function downloadPythonFile()
    {
        // Konten Python yang ingin Anda masukkan ke dalam file Python.
        $content = "# Ini adalah skrip Python\n\nprint('Hello, World!')";

        // Nama file dan jenis konten.
        $filename = 'script.py';

        // Menyimpan konten Python ke dalam file sementara.
        Storage::put($filename, $content);

        // Menggunakan Laravel's Response untuk mengirim file ke browser.
        return Response::stream(function () use ($filename) {
            $file = Storage::get($filename);
            echo $file;
        }, 200, [
            'Content-Type' => 'application/octet-stream',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ]);
    }

    public function savePythonScript(Request $request)
    {
        $pythonScript = $request->input('python_script');

        // Simpan skrip Python ke dalam file sementara.
        $filename = 'user_script.py';
        Storage::put($filename, $pythonScript);

        // Kembalikan file Python yang dibuat untuk diunduh.
        $fileContent = Storage::get($filename);

        return Response::stream(function () use ($filename, $fileContent) {
            echo $fileContent;
        }, 200, [
            'Content-Type' => 'application/octet-stream',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ]);
    }
}
