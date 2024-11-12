<?php

namespace App\Http\Controllers;

use App\Models\Masuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class MasukController extends Controller
{
    public function index()
{
    $rsetMasuk = Masuk::with('barang')->paginate(5);

    return view('masuk.index', compact('rsetMasuk'));
}
public function create()
{
    $barangList = DB::table('barang')->pluck('merk', 'id');
    return view('masuk.create', compact('barangList'));
}

public function store(Request $request)
{
    $validatedData = $request->validate([
        'tgl_masuk' => 'nullable|date',
        'qty_masuk' => 'required|integer|min:1',
        'barang_id' => 'required|exists:barang,id',
    ]);

    $data = $validatedData;
    $data['tgl_masuk'] = Carbon::now();

    DB::table('barangmasuk')->insert($data);
    return redirect()->route('masuk.index')->with('success', 'Data berhasil disimpan');
}
}
