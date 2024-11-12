<?php

namespace App\Http\Controllers;

use App\Models\Keluar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class KeluarController extends Controller
{
    public function index()
{
    $rsetKeluar = Keluar::with('barang')->orderBy('tgl_keluar', 'desc')->paginate(5);

    return view('keluar.index', compact('rsetKeluar'));
}
public function create()
{
    $barangList = DB::table('barang')->pluck('merk', 'id');
    return view('keluar.create', compact('barangList'));
}

public function store(Request $request)
{
    $validatedData = $request->validate([
        'tgl_keluar' => 'nullable|date',
        'qty_keluar' => 'required|integer|min:1',
        'barang_id' => 'required|exists:barang,id',
    ]);

    $data = $validatedData;
    $data['tgl_keluar'] = Carbon::now();

    DB::table('barangkeluar')->insert($data);
    return redirect()->route('keluar.index')->with('success', 'Data berhasil disimpan');
}
}
