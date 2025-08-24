<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Santri extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'nama_lengkap',
        'nama_panggilan',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat_lengkap',
        'sekolah_asal',
        'nisn',
        'no_rekening',
        'bukti_transfer'
    ];

    public function orangTua()
    {
        return $this->hasMany(OrangTua::class);
    }
}
