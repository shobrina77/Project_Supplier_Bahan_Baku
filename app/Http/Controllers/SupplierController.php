<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::all();
        return view('suppliers.index', compact('suppliers'));
    }

    public function create()
    {
        // Staff dan Admin bisa tambah data
        return view('suppliers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_supplier' => 'required',
            'alamat' => 'required',
            'jenis_pasokan' => 'required',
            'nomor_kontak' => 'required|numeric',
        ], [
            'nomor_kontak.numeric' => 'Nomor kontak harus diisi dengan angka!',
        ]);

        Supplier::create($request->all());

        return redirect()->route('supplier.index')->with('success', 'Data supplier berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $supplier = Supplier::where('id_supplier', $id)->firstOrFail();
        return view('suppliers.edit', compact('supplier'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_supplier' => 'required',
            'alamat' => 'required',
            'jenis_pasokan' => 'required',
            'nomor_kontak' => 'required|numeric',
        ], [
            'nomor_kontak.numeric' => 'Nomor kontak harus diisi dengan angka!',
        ]);

        $supplier = Supplier::where('id_supplier', $id)->firstOrFail();
        $supplier->update($request->all());

        return redirect()->route('supplier.index')->with('success', 'Data supplier berhasil diubah!');
    }

    public function destroy($id)
    {
        if (Auth::check() && Auth::user()->role !== 'admin') {
            abort(403, 'Unauthorized action. Anda bukan Admin, tidak berhak menghapus data!');
        }

        $supplier = Supplier::where('id_supplier', $id)->firstOrFail();
        $supplier->delete();

        return redirect()->route('supplier.index')->with('success', 'Data supplier berhasil dihapus!');
    }
}