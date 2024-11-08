<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BarangController extends Controller
{
    public function index(Request $request)
{
    if (request('search')) {
        $rsetBarang = Barang::with('kategori')
            ->where('id', 'like', "%{$request->search}%")
            ->orWhere('merk', 'like', "%{$request->search}%")
            ->orWhere('seri', 'like', "%{$request->search}%")
            ->paginate(5);
    } else {
        $rsetBarang = Barang::with('kategori')->paginate(5);
    }

    return view('barang.index', compact('rsetBarang'));
}

    public function create()
    {
        $kategoriList = DB::table('kategori')->pluck('deskripsi', 'id');
        return view('barang.create', compact('kategoriList'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'merk' => 'required|string|max:30',
            'seri' => 'required|string|max:40',
            'spesifikasi' => 'nullable|string',
            'stok' => 'integer|',
            'kategori_id' => 'required|exists:kategori,id'
        ]);

        Barang::create($request->only(['merk', 'seri', 'spesifikasi', 'stok', 'kategori_id']));
        return redirect()->route('barang.index')->with(['success' => 'Data Berhasil Disimpan']);
    }

    public function show(string $id)
    {
        $rsetBarang = Barang::with('kategori')->findOrFail($id);
        return view('barang.show', compact('rsetBarang'));
    }

    public function destroy(string $id)
    {
        $rsetBarang = Barang::findOrFail($id);
        $rsetBarang->delete();
        return redirect()->route('barang.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
    
    public function edit($id)
    {
        $barang = Barang::findOrFail($id);
        $kategoriList = DB::table('kategori')->pluck('deskripsi', 'id');
        return view('barang.edit', compact('barang', 'kategoriList'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'merk' => 'required|string|max:30',
            'seri' => 'required|string|max:40',
            'spesifikasi' => 'nullable|string',
            'stok' => 'required|integer',
            'kategori_id' => 'required|exists:kategori,id'
        ]);

        $rsetBarang = Barang::findOrFail($id);
        $rsetBarang->update($request->only(['merk', 'seri', 'spesifikasi', 'stok', 'kategori_id']));

        return redirect()->route('barang.index')->with('success', 'Data Berhasil Diubah!');
    }
}