<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Wali Murid</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h2>Edit Siswa</h2>
    <form action="{{ route('siswa.update', $siswa->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="nis" class="form-label">NIS</label>
        <input type="text" class="form-control" id="nis" name="nis" value="{{ $siswa->nis }}" required>
    </div>

    <div class="mb-3">
        <label for="nama_siswa" class="form-label">Nama Siswa</label>
        <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" value="{{ $siswa->nama_siswa }}" required>
    </div>

    <div class="mb-3">
        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
        <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" required>
            <option value="L" {{ $siswa->jenis_kelamin == 'L' ? 'selected' : '' }}>Laki-laki</option>
            <option value="P" {{ $siswa->jenis_kelamin == 'P' ? 'selected' : '' }}>Perempuan</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
        <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="{{ $siswa->tempat_lahir }}" required>
    </div>

    <div class="mb-3">
        <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{ $siswa->tanggal_lahir }}" required>
    </div>

    <div class="mb-3">
        <label for="id_kelas" class="form-label">Kelas</label>
        <select class="form-select" id="id_kelas" name="id_kelas" required>
            @foreach($kelas as $kelasItem)
                <option value="{{ $kelasItem->id }}" {{ $kelasItem->id == $siswa->id_kelas ? 'selected' : '' }}>
                    {{ $kelasItem->nama_kelas }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="id_wali" class="form-label">Wali Murid</label>
        <select class="form-select" id="id_wali" name="id_wali" required>
            @foreach($waliMurid as $wali)
                <option value="{{ $wali->id }}" {{ $wali->id == $siswa->id_wali ? 'selected' : '' }}>
                    {{ $wali->nama_wali }}
                </option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-warning">Update</button>
    <a href="{{ route('siswa.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
</body>
</html>