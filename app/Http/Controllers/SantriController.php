<?php

// app/Http/Controllers/SantriController.php
namespace App\Http\Controllers;

use App\Models\Santri;
use App\Models\OrangTua;
use Illuminate\Http\Request;

// app/Http/Controllers/SantriController.php

class SantriController extends Controller
{
public function print($id)
{
    $santri = Santri::with('orangTua')->findOrFail($id);
    return view('santri.print', compact('santri'));
}
    public function create()
    {
        return view('santri.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'status' => 'required|in:baru,pindahan',
            'nama_lengkap' => 'required|string|max:255',
            'nama_panggilan' => 'required|string|max:100',
            'tempat_lahir' => 'required|string|max:100',
            'tanggal_lahir' => 'required|date',
            'alamat_lengkap' => 'required|string',
            'sekolah_asal' => 'required|string|max:255',
            'nisn' => 'nullable|string|max:20',
            'no_rekening' => 'required|string|max:50',
            'bukti_transfer' => 'required|file|mimes:jpeg,png,jpg,pdf|max:2048',
            
            // Validasi untuk data ayah
            'ayah_nama' => 'required|string|max:255',
            'ayah_tempat_lahir' => 'required|string|max:100',
            'ayah_tanggal_lahir' => 'required|date',
            'ayah_kontak' => 'required|string|max:20',
            'ayah_alamat' => 'required|string',
            
            // Validasi untuk data ibu
            'ibu_nama' => 'required|string|max:255',
            'ibu_tempat_lahir' => 'required|string|max:100',
            'ibu_tanggal_lahir' => 'required|date',
            'ibu_kontak' => 'required|string|max:20',
            'ibu_alamat' => 'required|string',
            
            // Validasi untuk data wali (jika ada)
            'wali_nama' => 'nullable|string|max:255',
            'wali_tempat_lahir' => 'nullable|string|max:100',
            'wali_tanggal_lahir' => 'nullable|date',
            'wali_kontak' => 'nullable|string|max:20',
            'wali_alamat' => 'nullable|string',
            'wali_hubungan' => 'nullable|string|max:100',
        ]);

        // Upload bukti transfer
        $buktiTransferPath = $request->file('bukti_transfer')->store('bukti_transfer', 'public');

        // Simpan data santri
        $santri = Santri::create([
            'status' => $request->status,
            'nama_lengkap' => $request->nama_lengkap,
            'nama_panggilan' => $request->nama_panggilan,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat_lengkap' => $request->alamat_lengkap,
            'sekolah_asal' => $request->sekolah_asal,
            'nisn' => $request->nisn,
            'no_rekening' => $request->no_rekening,
            'bukti_transfer' => $buktiTransferPath,
        ]);

        // Simpan data ayah
        OrangTua::create([
            'santri_id' => $santri->id,
            'tipe' => 'ayah',
            'nama' => $request->ayah_nama,
            'tempat_lahir' => $request->ayah_tempat_lahir,
            'tanggal_lahir' => $request->ayah_tanggal_lahir,
            'kontak' => $request->ayah_kontak,
            'alamat' => $request->ayah_alamat,
        ]);

        // Simpan data ibu
        OrangTua::create([
            'santri_id' => $santri->id,
            'tipe' => 'ibu',
            'nama' => $request->ibu_nama,
            'tempat_lahir' => $request->ibu_tempat_lahir,
            'tanggal_lahir' => $request->ibu_tanggal_lahir,
            'kontak' => $request->ibu_kontak,
            'alamat' => $request->ibu_alamat,
        ]);

        // Simpan data wali jika diisi
        if ($request->filled('wali_nama')) {
            OrangTua::create([
                'santri_id' => $santri->id,
                'tipe' => 'wali',
                'nama' => $request->wali_nama,
                'tempat_lahir' => $request->wali_tempat_lahir,
                'tanggal_lahir' => $request->wali_tanggal_lahir,
                'kontak' => $request->wali_kontak,
                'alamat' => $request->wali_alamat,
                'hubungan' => $request->wali_hubungan,
            ]);
        }
	// app/Http/Controllers/SantriController.php
// Di method store, sebelum return
session()->flash('last_id', $santri->id);
        return redirect()->route('santri.print', $santri->id)
                         ->with('success', 'Pendaftaran berhasil dikirim.');
    }
}
