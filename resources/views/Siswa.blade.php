<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h2 class="mb-3">Data Siswa</h2>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
    <div class="d-flex mb-3">
        <a href="{{ url('kelas') }}" class="btn btn-primary">Kelola Kelas</a>
        <a href="{{ url('wali_murid') }}" class="btn btn-primary ms-1">Kelola Wali Murid</a>

        <form method="GET" action="{{ route('siswa.index') }}" class="d-flex ms-auto">
            <input type="text" name="search" class="form-control me-2" placeholder="Cari siswa..." value="{{ $search }}">
            <button type="submit" class="btn btn-success">Cari</button>
        </form>

        <a href="{{ url('siswa/create') }}" class="btn btn-success ms-2">Tambah Siswa</a>
    </div>

    <table class="table table-bordered">
        <thead class="table-dark">
        <tr>
            <th>NIS</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Tempat Lahir</th>
            <th>Tanggal Lahir</th>
            <th>Kelas</th>
            <th>Wali</th>
            <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
        @forelse ($siswa as $item)
            <tr>
                <td>{{ $item->nis }}</td>
                <td>{{ $item->nama_siswa }}</td>
                <td>{{ $item->jenis_kelamin }}</td>
                <td>{{ $item->tempat_lahir }}</td>
                <td>{{ \Carbon\Carbon::parse($item->tanggal_lahir)->format('d-m-Y') }}</td>
                <td>{{ $item->kelas->nama_kelas ?? '-' }}</td>
                <td>{{ $item->wali->nama_wali ?? '-' }}</td>
                <td>
                    <a href="{{ url('siswa/' . $item->id . '/edit') }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ url('siswa/' . $item->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="8" class="text-center">Tidak ada data</td></tr>
        @endforelse
        </tbody>
    </table>

    {{ $siswa->appends(['search' => $search])->links() }}
</div>
</body>
</html>