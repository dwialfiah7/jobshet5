<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2 class="mb-3">Tambah Siswa</h2>
        <form action="{{ route('siswa.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nis" class="form-label">NIS</label>
                <input type="text" class="form-control" id="nis" name="nis" required>
            </div>
            <div class="mb-3">
                <label for="nama_siswa" class="form-label">Nama Siswa</label>
                <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" required>
            </div>
            <div class="mb-3">
                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" required>
                    <option value="L">Laki-laki</option>
                    <option value="P">Perempuan</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" required>
            </div>
            <div class="mb-3">
                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
            </div>
            <div class="mb-3">
                <label for="id_kelas" class="form-label">Kelas</label>
                <select class="form-select" id="id_kelas" name="id_kelas" required>
                    @foreach($kelas as $k)
                        <option value="{{ $k->id }}">{{ $k->nama_kelas }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="id_wali" class="form-label">Wali Murid</label>
                <select class="form-select" id="id_wali" name="id_wali" required>
                    @foreach($wali as $w)
                        <option value="{{ $w->id }}">{{ $w->nama_wali }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="{{ route('siswa.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</body>
</html>