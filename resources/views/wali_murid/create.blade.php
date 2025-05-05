<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Wali Murid</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2 class="mb-3">Tambah Wali Murid</h2>
        
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('wali_murid.store') }}">
            @csrf

            <div class="mb-3">
                <label for="nama_wali" class="form-label">Nama Wali</label>
                <input type="text" class="form-control" id="nama_wali" name="nama_wali" required>
            </div>

            <div class="mb-3">
                <label for="kontak" class="form-label">No. Telepon</label>
                <input type="text" class="form-control" id="kontak" name="kontak" required>
            </div>

            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="{{ route('wali_murid.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</body>
</html>