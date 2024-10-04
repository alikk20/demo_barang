<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Providers\AppServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KategoriController extends Controller
{
    public function index(Request $request)
    {
        //return view('layout.adm_tmplet');
        //$rsetKategori = DB::table('kategori')->get();
        //return $rsetKategori;
        //return $rsetKategori[0]->deskripsi;
        
        // $row = $rsetKategori[1];
        
        //return $row->id.$row->deskripsi.$row->kategori;
        if (request('search')){
            $rsetKategori = DB::table('kategori')
                          ->select('id','deskripsi','kategori',
                                    DB::raw('ketKategori(kategori) as ket'))
                        ->where('id', 'like', $request->search)
                        ->orwhere('deskripsi','like','%'.$request->search.'%')
                        ->paginate(5);
        }else{
            $rsetKategori = DB::table('kategori')->select('id',
                                                    'deskripsi',
                                                    'kategori',
                                                    DB::raw('ketKategori(kategori) as ket'))
                                                ->paginate(5);
        }

        return view('kategori.index',compact('rsetKategori'));
    }
    public function create()
    {
        $listkategori = array(''=>'Pilih Kategori','M'=>'Modal','A'=>'Alat','BHP'=>'Bahan Habis Pakai','BTHP'=>'Bahan Tidak Habis Pakai');
        return view('kategori.create',compact('listkategori'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'deskripsi' => 'required',
            'kategori' => 'required'
        ]);
        kategori::create([
            'deskripsi' => $request->deskripsi,
            'kategori' => $request->kategori
        ]);
        return redirect()->route('kategori.index')->with(['success' => 'Data Berhasil Disimpan']);
    }

    public function show(string $id)
    {
        $rsetKategori = DB::table('kategori')
                    ->select('id','deskripsi','kategori',
                            DB::raw('ketKategori(kategori) as ket'))
                    ->where('id',$id)
                    ->get();

        return view('kategori.show', compact('rsetKategori'));
    }       

    public function destroy(string $id)
    {
        if (DB::table('barang')->where('kategori_id', $id)->exists()){
            return redirect()->route('kategori.index')->with(['Gagal' => 'Gagal dihapus']);
        } else {
            $rsetKategori = Kategori::find($id);
            $rsetKategori->delete();
            return redirect()->route('kategori.index')->with(['Success' => 'Berhasil dihapus']);
        }
    }
    
    public function edit($id)
    {
        $kategori = Kategori::findOrFail($id);
        $listkategori = [
            '' => 'Pilih Kategori',
            'M' => 'Modal',
            'A' => 'Alat',
            'BHP' => 'Bahan Habis Pakai',
            'BTHP' => 'Bahan Tidak Habis Pakai'
        ];
        
        return view('kategori.edit', compact('kategori', 'listkategori'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'deskripsi' => 'required',
            'kategori' => 'required',
        ]);

        $rsetKategori = Kategori::findOrFail($id);
        $rsetKategori->update($request->only(['deskripsi', 'kategori']));

        return redirect()->route('kategori.index')->with('success', 'Data Berhasil Diubah!');
    }

    
}
