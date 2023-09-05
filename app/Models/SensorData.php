<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SensorData extends Model
{
    use HasFactory;
    protected $table = 'db_project_building';
    protected $primaryKey = 'id';
    protected $fillable = ['nilai_banjir','keadaan_banjir','nilai_suhu','keadaan_suhu','nilai_kelembapan','keadaan_kelembapan','nilai_hujan','keadaan_hujan'];  

}
