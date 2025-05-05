<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\WaliMurid;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index(Request $request)
{
    $search = $request->query('search');
  
    $siswa = Siswa::with(['kelas', 'wali'])
        ->when($search, function ($query, $search) {
            return $query->where('nama_siswa', 'like', '%' . $search . '%');
        })
        ->paginate(10);

    return view('siswa', compact('siswa', 'search'));
}

public function create()
    {
        $kelas = Kelas::all();
        $wali = WaliMurid::all();
        return view('siswa.create', compact('kelas', 'wali'));
    }

public function store(Request $request)
    {
        $request->validate([
            'nis' => 'required|unique:siswa',
            'nama_siswa' => 'required|string',
            'jenis_kelamin' => 'required|string',
            'tempat_lahir' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'id_kelas' => 'required|exists:kelas,id',
            'id_wali' => 'required|exists:wali_murid,id',
        ]);

        Siswa::create($request->all());

        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $siswa = Siswa::findOrFail($id); 
        $kelas = Kelas::all(); 
        $waliMurid = WaliMurid::all(); 

        return view('siswa.edit', compact('siswa', 'kelas', 'waliMurid')); 
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nis' => 'required|string',
            'nama_siswa' => 'required|string',
            'jenis_kelamin' => 'required|string',
            'tempat_lahir' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'id_kelas' => 'required|exists:kelas,id',
            'id_wali' => 'required|exists:wali_murid,id',
        ]);

        $siswa = Siswa::findOrFail($id);

        $siswa->update([
            'nis' => $request->nis,
            'nama_siswa' => $request->nama_siswa,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'id_kelas' => $request->id_kelas,
            'id_wali' => $request->id_wali,
        ]);

        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil diupdate!');
    }

    public function destroy($id)
    {
    $siswa = Siswa::findOrFail($id);
    
    $siswa->delete();

    return redirect()->route('siswa.index')->with('success', 'Siswa berhasil dihapus.');
    }

}