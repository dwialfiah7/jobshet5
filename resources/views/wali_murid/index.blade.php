<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wali Murid</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-4">
        <h2 class="mb-3">Data Wali Murid</h2>
        <div class="d-flex justify-content-between mb-3">
        <a href="{{ route('siswa.index') }}" class="btn btn-primary">Kembali ke Data Siswa</a>
            <form method="GET" class="d-flex">
                <input type="text" name="search" class="form-control me-2" placeholder="Cari wali murid..." value="{{ $search }}">
                <button type="submit" class="btn btn-success">Cari</button>
            </form>
            <a href="{{ url('wali_murid/create') }}" class="btn btn-success">Tambah Wali Murid</a>
        </div>
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Nama Wali</th>
                    <th>No. Telepon</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
    @forelse($waliMurid as $wali)
        <tr>
            <td>{{ $wali->nama_wali }}</td>
            <td>{{ $wali->kontak }}</td>
            <td>
            <a href="{{ route('wali_murid.edit', $wali->id) }}" class="btn btn-warning btn-sm">Edit</a>
            <form action="{{ route('wali_murid.destroy', $wali->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button onclick="return confirm('Yakin ingin menghapus?');" class="btn btn-danger btn-sm">Hapus</button>
            </form>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="3" class="text-center">Tidak ada data</td>
        </tr>
    @endforelse
    </tbody>

        </table>
        <nav>
            <ul class="pagination">
                @for ($i = 1; $i <= $waliMurid->lastPage(); $i++)
                    <li class="page-item {{ $waliMurid->currentPage() == $i ? 'active' : '' }}">
                        <a class="page-link" href="{{ $waliMurid->url($i) }}">{{ $i }}</a>
                    </li>
                @endfor
            </ul>
        </nav>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>