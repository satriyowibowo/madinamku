<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
// database/migrations/xxxx_xx_xx_xxxxxx_create_orang_tuas_table.php
public function up()
{
    Schema::create('orang_tuas', function (Blueprint $table) {
        $table->id();
        $table->foreignId('santri_id')->constrained()->onDelete('cascade');
        $table->enum('tipe', ['ayah', 'ibu', 'wali']);
        $table->string('nama');
        $table->string('tempat_lahir');
        $table->date('tanggal_lahir');
        $table->string('kontak');
        $table->text('alamat');
        $table->string('hubungan')->nullable();
        $table->timestamps();
    });
}
};
