<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrangTua extends Model
{
    use HasFactory;

    protected $fillable = [
        'santri_id',
        'tipe',
        'nama',
        'tempat_lahir',
        'tanggal_lahir',
        'kontak',
        'alamat',
        'hubungan'
    ];

    public function santri()
    {
        return $this->belongsTo(Santri::class);
    }
}
