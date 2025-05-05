<?php

namespace App\Http\Controllers;

use App\Models\WaliMurid;
use Illuminate\Http\Request;

class WaliMuridController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $waliMurid = WaliMurid::when($search, function ($query, $search) {
            return $query->where('nama_wali', 'like', "%{$search}%");
        })->paginate(10);

        return view('wali_murid.index', compact('waliMurid', 'search'));
    }

    public function create()
{
    return view('wali_murid.create');
}

public function store(Request $request)
    {
        $request->validate([
            'nama_wali' => 'required',
            'kontak' => 'required',
        ]);

        WaliMurid::create([
            'nama_wali' => $request->nama_wali,
            'kontak' => $request->kontak,
        ]);

        return redirect()->route('wali_murid.index')->with('success', 'Wali murid berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $waliMurid = WaliMurid::findOrFail($id);
        return view('wali_murid.edit', compact('waliMurid'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_wali' => 'required',
            'kontak' => 'required',
        ]);
    
        $waliMurid = WaliMurid::findOrFail($id);
        $waliMurid->update([
            'nama_wali' => $request->nama_wali,
            'kontak' => $request->kontak,
        ]);
    return redirect()->route('wali_murid.index')->with('success', 'Data berhasil diupdate!');
    }

    public function destroy($id)
    {
        $waliMurid = WaliMurid::findOrFail($id);
        $waliMurid->delete();

        return redirect()->route('wali_murid.index')->with('success', 'Wali murid berhasil dihapus.');
    }
}