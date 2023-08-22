<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataSuhu extends Model
{
    
    use HasFactory;
    protected $table = 'sensor_data';
    // protected $fillable = ['nilai_suhu','keadaan_suhu'];
}
