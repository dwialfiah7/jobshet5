<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Wali Murid</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h2>Edit Wali Murid</h2>
    <form method="POST" action="{{ route('wali_murid.update', $waliMurid->id) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nama_wali" class="form-label">Nama Wali</label>
            <input type="text" name="nama_wali" class="form-control" value="{{ $waliMurid->nama_wali }}" required>
        </div>
        <div class="mb-3">
            <label for="kontak" class="form-label">Kontak</label>
            <input type="text" name="kontak" class="form-control" value="{{ $waliMurid->kontak }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('wali_murid.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
</body>
</html>