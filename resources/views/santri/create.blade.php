<!-- resources/views/santri/create.blade.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pendaftaran Santri</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Form Pendaftaran Santri</h2>
        
<!-- resources/views/santri/create.blade.php -->
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
        <br>
        <a href="{{ route('santri.print', session('last_id')) }}" target="_blank" class="btn btn-sm btn-outline-primary mt-2">
            Cetak Formulir Pendaftaran
        </a>
    </div>
@endif
        <form action="{{ route('santri.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    Data Santri
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select" id="status" name="status" required>
                                <option value="">Pilih Status</option>
                                <option value="baru" {{ old('status') == 'baru' ? 'selected' : '' }}>Baru</option>
                                <option value="pindahan" {{ old('status') == 'pindahan' ? 'selected' : '' }}>Pindahan</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="{{ old('nama_lengkap') }}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="nama_panggilan" class="form-label">Nama Panggilan</label>
                            <input type="text" class="form-control" id="nama_panggilan" name="nama_panggilan" value="{{ old('nama_panggilan') }}" required>
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="{{ old('tempat_lahir') }}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" required>
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-12">
                            <label for="alamat_lengkap" class="form-label">Alamat Lengkap</label>
                            <textarea class="form-control" id="alamat_lengkap" name="alamat_lengkap" rows="3" required>{{ old('alamat_lengkap') }}</textarea>
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="sekolah_asal" class="form-label">Sekolah Asal</label>
                            <input type="text" class="form-control" id="sekolah_asal" name="sekolah_asal" value="{{ old('sekolah_asal') }}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="nisn" class="form-label">NISN (Bila Ada)</label>
                            <input type="text" class="form-control" id="nisn" name="nisn" value="{{ old('nisn') }}">
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    Data Orang Tua
                </div>
                <div class="card-body">
                    <h5 class="mb-3">Ayah</h5>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="ayah_nama" class="form-label">Nama Ayah</label>
                            <input type="text" class="form-control" id="ayah_nama" name="ayah_nama" value="{{ old('ayah_nama') }}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="ayah_tempat_lahir" class="form-label">Tempat Lahir</label>
                            <input type="text" class="form-control" id="ayah_tempat_lahir" name="ayah_tempat_lahir" value="{{ old('ayah_tempat_lahir') }}" required>
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="ayah_tanggal_lahir" class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="ayah_tanggal_lahir" name="ayah_tanggal_lahir" value="{{ old('ayah_tanggal_lahir') }}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="ayah_kontak" class="form-label">Kontak</label>
                            <input type="text" class="form-control" id="ayah_kontak" name="ayah_kontak" value="{{ old('ayah_kontak') }}" required>
                        </div>
                    </div>
                    
                    <div class="row mb-4">
                        <div class="col-12">
                            <label for="ayah_alamat" class="form-label">Alamat</label>
                            <textarea class="form-control" id="ayah_alamat" name="ayah_alamat" rows="3" required>{{ old('ayah_alamat') }}</textarea>
                        </div>
                    </div>
                    
                    <h5 class="mb-3">Ibu</h5>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="ibu_nama" class="form-label">Nama Ibu</label>
                            <input type="text" class="form-control" id="ibu_nama" name="ibu_nama" value="{{ old('ibu_nama') }}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="ibu_tempat_lahir" class="form-label">Tempat Lahir</label>
                            <input type="text" class="form-control" id="ibu_tempat_lahir" name="ibu_tempat_lahir" value="{{ old('ibu_tempat_lahir') }}" required>
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="ibu_tanggal_lahir" class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="ibu_tanggal_lahir" name="ibu_tanggal_lahir" value="{{ old('ibu_tanggal_lahir') }}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="ibu_kontak" class="form-label">Kontak</label>
                            <input type="text" class="form-control" id="ibu_kontak" name="ibu_kontak" value="{{ old('ibu_kontak') }}" required>
                        </div>
                    </div>
                    
                    <div class="row mb-4">
                        <div class="col-12">
                            <label for="ibu_alamat" class="form-label">Alamat</label>
                            <textarea class="form-control" id="ibu_alamat" name="ibu_alamat" rows="3" required>{{ old('ibu_alamat') }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    Data Wali (Jika Ada)
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="wali_nama" class="form-label">Nama Wali</label>
                            <input type="text" class="form-control" id="wali_nama" name="wali_nama" value="{{ old('wali_nama') }}">
                        </div>
                        <div class="col-md-6">
                            <label for="wali_tempat_lahir" class="form-label">Tempat Lahir</label>
                            <input type="text" class="form-control" id="wali_tempat_lahir" name="wali_tempat_lahir" value="{{ old('wali_tempat_lahir') }}">
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="wali_tanggal_lahir" class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="wali_tanggal_lahir" name="wali_tanggal_lahir" value="{{ old('wali_tanggal_lahir') }}">
                        </div>
                        <div class="col-md-6">
                            <label for="wali_kontak" class="form-label">Kontak</label>
                            <input type="text" class="form-control" id="wali_kontak" name="wali_kontak" value="{{ old('wali_kontak') }}">
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="wali_alamat" class="form-label">Alamat</label>
                            <textarea class="form-control" id="wali_alamat" name="wali_alamat" rows="3">{{ old('wali_alamat') }}</textarea>
                        </div>
                        <div class="col-md-6">
                            <label for="wali_hubungan" class="form-label">Hubungan dengan Santri</label>
                            <select class="form-select" id="wali_hubungan" name="wali_hubungan">
                                <option value="">Pilih Hubungan</option>
                                <option value="kakek" {{ old('wali_hubungan') == 'kakek' ? 'selected' : '' }}>Kakek</option>
                                <option value="nenek" {{ old('wali_hubungan') == 'nenek' ? 'selected' : '' }}>Nenek</option>
                                <option value="paman" {{ old('wali_hubungan') == 'paman' ? 'selected' : '' }}>Paman</option>
                                <option value="bibi" {{ old('wali_hubungan') == 'bibi' ? 'selected' : '' }}>Bibi</option>
                                <option value="kakak" {{ old('wali_hubungan') == 'kakak' ? 'selected' : '' }}>Kakak</option>
                                <option value="adik" {{ old('wali_hubungan') == 'adik' ? 'selected' : '' }}>Adik</option>
                                <option value="lainnya" {{ old('wali_hubungan') == 'lainnya' ? 'selected' : '' }}>Lainnya</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    Informasi Pembayaran
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-12">
                            <div class="alert alert-info">
                                <strong>Rekening untuk Transfer:</strong><br>
                                Bank: BSI (Bank Syariah Indonesia)<br>
                                No. Rekening: 7211 542 513<br>
                                Atas Nama: MIFTAHU KHAIRIL UMMAH RISTAWA<br>
                                Jumlah: Rp 250.000,- (Biaya Pendaftaran)
                                Berita: Pendaftaran<spasi>Nama Santri
                            </div>
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="no_rekening" class="form-label">No. Rekening Pengirim</label>
                            <input type="text" class="form-control" id="no_rekening" name="no_rekening" value="{{ old('no_rekening') }}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="bukti_transfer" class="form-label">Upload Bukti Transfer</label>
                            <input type="file" class="form-control" id="bukti_transfer" name="bukti_transfer" accept=".jpg,.jpeg,.png,.pdf" required>
                            <small class="form-text text-muted">Format: JPG, PNG, PDF (Maks. 2MB)</small>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-success btn-lg">Kirim Pendaftaran</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
