<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sensors', function (Blueprint $table) {
            $table->id();
            $table->string('nilai_banjir');
            $table->string('keadaan_banjir');
            $table->string('nilai_suhu');
            $table->string('keadaan_suhu');
            $table->string('nilai_kelembapan');
            $table->string('keadaan_kelembapan');
            $table->string('nilai_hujan');
            $table->string('keadaan_hujan');
            $table->timestamp('waktu')->useCurrent();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sensors');
    }
};
