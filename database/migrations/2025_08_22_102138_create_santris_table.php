<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
// database/migrations/xxxx_xx_xx_xxxxxx_create_santris_table.php
public function up()
{
    Schema::create('santris', function (Blueprint $table) {
        $table->id();
        $table->enum('status', ['baru', 'pindahan']);
        $table->string('nama_lengkap');
        $table->string('nama_panggilan');
        $table->string('tempat_lahir');
        $table->date('tanggal_lahir');
        $table->text('alamat_lengkap');
        $table->string('sekolah_asal');
        $table->string('nisn')->nullable();
        $table->string('no_rekening')->nullable();
        $table->string('bukti_transfer')->nullable();
        $table->timestamps();
    });
}
};
