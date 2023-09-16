<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class PythonFileController extends Controller
{

    public function savePythonScript(Request $request)
    {
        $pythonScript = $request->input('python_script');

        // Simpan skrip Python ke dalam file sementara.
        $filename = 'telegram_SQL.py';
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

    public function downloadTemplate()
    {
        // Template code Python
        $pythonCode = <<<PYTHON
        import telebot
        import mysql.connector
        
        mydb = mysql.connector.connect(
            host='localhost',
            user='root',
            passwd='',
            database='project_building'
            )
        
        print(mydb)
        sql = mydb.cursor()
        
        api = '6387491041:AAGrYMx4csuxllNJfCSVqqn3Mv1Hiropr34'
        bot = telebot.TeleBot(api)
        
        @bot.message_handler(commands=['status_air'])
        def status(message):
            sql.execute("SELECT nilai_banjir, keadaan_banjir FROM db_project_building ORDER BY id DESC LIMIT 1")
            hasil_sql = sql.fetchall()
            print(hasil_sql)
            hasil_banjir = ''
            for x in hasil_sql:
                hasil_banjir = 'Status Air = ' + hasil_banjir + str(x) + '\n'
                hasil_banjir = hasil_banjir.replace("'","")
                hasil_banjir = hasil_banjir.replace("(","")
                hasil_banjir = hasil_banjir.replace(")","")
        
                bot.reply_to(message, hasil_banjir)
        
        @bot.message_handler(commands=['status_suhu'])
        def status(message):
            sql.execute("SELECT nilai_suhu, keadaan_suhu FROM db_project_building id DESC LIMIT 1")
            hasil_sql = sql.fetchall()
            print(hasil_sql)
            hasil_suhu = ''
            for x in hasil_sql:
                hasil_suhu = 'Status Suhu = ' + hasil_suhu + str(x) + '\n'
                hasil_suhu = hasil_suhu.replace("'","")
                hasil_suhu = hasil_suhu.replace("(","")
                hasil_suhu = hasil_suhu.replace(")","")
        
                bot.reply_to(message, hasil_suhu)
        
        @bot.message_handler(commands=['status_kelembapan'])
        def status(message):
            sql.execute("SELECT nilai_kelembapan, keadaan_kelembapan FROM db_project_building ORDER BY id DESC LIMIT 1")
            hasil_sql = sql.fetchall()
            print(hasil_sql)
            hasil_kelembapan = ''
            for x in hasil_sql:
                hasil_kelembapan = 'Status kelembapan = ' + hasil_kelembapan + str(x) + '\n'
                hasil_kelembapan = hasil_kelembapan.replace("'","")
                hasil_kelembapan = hasil_kelembapan.replace("(","")
                hasil_kelembapan = hasil_kelembapan.replace(")","")
        
                bot.reply_to(message, hasil_kelembapan)
        
        @bot.message_handler(commands=['status_hujan'])
        def status(message):
            sql.execute("SELECT nilai_hujan, keadaan_hujan FROM db_project_building ORDER BY id DESC LIMIT 1")
            hasil_sql = sql.fetchall()
            print(hasil_sql)
            hasil_hujan = ''
            for x in hasil_sql:
                hasil_hujan = 'Status hujan = ' + hasil_hujan + str(x) + '\n'
                hasil_hujan = hasil_hujan.replace("'","")
                hasil_hujan = hasil_hujan.replace("(","")
                hasil_hujan = hasil_hujan.replace(")","")
        
                bot.reply_to(message, hasil_hujan)
        
        @bot.message_handler(commands=['status_semua'])
        def status(message):
            sql.execute("SELECT nilai_banjir, keadaan_banjir FROM db_project_building ORDER BY id DESC LIMIT 1")
            hasil_sql = sql.fetchall()
            print(hasil_sql)
            hasil_banjir = ''
            for x in hasil_sql:
                hasil_banjir = 'Status Air = ' + hasil_banjir + str(x) + '\n'
                hasil_banjir = hasil_banjir.replace("'","")
                hasil_banjir = hasil_banjir.replace("(","")
                hasil_banjir = hasil_banjir.replace(")","")
        
            sql.execute("SELECT nilai_suhu, keadaan_suhu FROM db_project_building ORDER BY id DESC LIMIT 1")
            hasil_sql = sql.fetchall()
            print(hasil_sql)
            hasil_suhu = ''
            for x in hasil_sql:
                hasil_suhu = 'Status Suhu = ' + hasil_suhu + str(x) + '\n'
                hasil_suhu = hasil_suhu.replace("'","")
                hasil_suhu = hasil_suhu.replace("(","")
                hasil_suhu = hasil_suhu.replace(")","")
        
            sql.execute("SELECT nilai_kelembapan, keadaan_kelembapan FROM db_project_building ORDER BY id DESC LIMIT 1")
            hasil_sql = sql.fetchall()
            print(hasil_sql)
            hasil_kelembapan = ''
            for x in hasil_sql:
                hasil_kelembapan = 'Status kelembapan = ' + hasil_kelembapan + str(x) + '\n'
                hasil_kelembapan = hasil_kelembapan.replace("'","")
                hasil_kelembapan = hasil_kelembapan.replace("(","")
                hasil_kelembapan = hasil_kelembapan.replace(")","")
        
            sql.execute("SELECT nilai_hujan, keadaan_hujan FROM db_project_building ORDER BY id DESC LIMIT 1")
            hasil_sql = sql.fetchall()
            print(hasil_sql)
            hasil_hujan = ''
            for x in hasil_sql:
                hasil_hujan = 'Status hujan = ' + hasil_hujan + str(x) + '\n'
                hasil_hujan = hasil_hujan.replace("'","")
                hasil_hujan = hasil_hujan.replace("(","")
                hasil_hujan = hasil_hujan.replace(")","")
        
            bot.reply_to(message, hasil_banjir)
            bot.reply_to(message, hasil_suhu)
            bot.reply_to(message, hasil_kelembapan)
            bot.reply_to(message, hasil_hujan)
        
        bot.polling()
PYTHON;

        // Simpan kode Python ke file sementara
        $tempFile = tempnam(sys_get_temp_dir(), 'python_template_');
        file_put_contents($tempFile, $pythonCode);

        // Nama file yang akan diunduh
        $fileName = 'template.py';

        // Header untuk mengatur jenis konten dan nama file
        $headers = [
            'Content-Type' => 'text/plain',
            'Content-Disposition' => "attachment; filename=$fileName",
        ];

        // Mengembalikan file yang akan diunduh
        return response()->file($tempFile, $headers);
    }
}
