<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function index()
    {
        $pegawai = Pegawai::all();
        return view('pegawai.index', compact('pegawai'));
    }

    public function create()
    {
        return view('pegawai.tambah');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'jabatan' => 'required',
            'nomor' => 'required|numeric',
        ]);

        Pegawai::create($request->all());
        return redirect()->route('pegawai.index')->with('success', 'Pegawai berhasil ditambahkan bos!');
    }

    public function edit(Pegawai $pegawai)
    {
        return view('pegawai.edit', compact('pegawai'));
    
    }

    public function update(Request $request, Pegawai $pegawai)
    {
        $request->validate([
            'nama' => 'required',
            'jabatan' => 'required',
            'nomor' => 'required|numeric',
        ]);

        $pegawai->update($request->all());
        return redirect()->route('pegawai.index')->with('success', 'Data pegawai berhasil diubah!');
    }

    public function destroy(Pegawai $pegawai)
    {
        $pegawai->delete();
        return redirect()->route('pegawai.index')->with('success', 'Pegawai berhasil dihapus!');
    }
}