<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Kelas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h2 class="mb-3">Data Kelas</h2>
    <div class="d-flex justify-content-between mb-3">
        <a href="{{ route('siswa.index') }}" class="btn btn-primary">Kembali ke Data Siswa</a>
        <form method="GET" action="{{ route('kelas.index') }}" class="d-flex">
            <input type="text" name="search" class="form-control me-2" placeholder="Cari kelas..." value="{{ request('search') }}">
            <button type="submit" class="btn btn-success">Cari</button>
        </form>
        <a href="{{ route('kelas.create') }}" class="btn btn-success">Tambah Kelas</a>
    </div>

    <table class="table table-bordered">
        <thead class="table-dark">
        <tr>
            <th>ID Kelas</th>
            <th>Nama Kelas</th>
            <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
        @forelse ($kelas as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->nama_kelas }}</td>
                <td>
                    <a href="{{ route('kelas.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('kelas.destroy', $item->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Yakin ingin menghapus?');" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="3" class="text-center">Tidak ada data</td></tr>
        @endforelse
        </tbody>
    </table>

    {{ $kelas->appends(['search' => request('search')])->links() }}
</div>
</body>
</html>