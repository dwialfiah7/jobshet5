<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index(Request $request)
{
    $search = $request->search;
    $query = \App\Models\Kelas::query();

    if ($search) {
        $query->where('nama_kelas', 'like', "%$search%");
    }

    $kelas = $query->paginate(10);

    return view('kelas', compact('kelas'));
}

public function create()
{
    return view('kelas.create');
}

public function store(Request $request)
    {
        $request->validate([
            'nama_kelas' => 'required|string|max:255',
        ]);

        Kelas::create([
            'nama_kelas' => $request->nama_kelas,
        ]);

        return redirect()->route('kelas.index')->with('success', 'Kelas berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $kelas = \App\Models\Kelas::findOrFail($id);
        return view('kelas.edit', compact('kelas'));
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kelas' => 'required|string|max:255',
        ]);
    
        $kelas = \App\Models\Kelas::findOrFail($id);
        $kelas->update([
            'nama_kelas' => $request->nama_kelas,
        ]);
    
        return redirect()->route('kelas.index')->with('success', 'Kelas berhasil diupdate!');
    } 
    
    public function destroy($id)
    {
    $kelas = Kelas::findOrFail($id);
    $kelas->delete();

    return redirect()->route('kelas.index')->with('success', 'Data kelas berhasil dihapus');
    }

}
