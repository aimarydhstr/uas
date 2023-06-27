<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Session;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barang = Barang::latest()->get();

        return view('index', compact('barang'))->with('i');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_barang' => 'required|unique:barang',
            'nama' => 'required|string',
            'gambar' => 'image|mimes:jpg,jpeg,png,gif,svg',
            'harga_beli' => 'required|integer',
            'harga_jual' => 'required|integer',
            'stok' => 'required|integer',
            'kategori' => 'required|string',
        ]);

        $img = $request->file('gambar');
        $image = 'default.png';

        if($img){
            $image = date('YmdHi').$img->getClientOriginalName();
            $img->move(public_path('images/'), $image);
        }

        $barang = Barang::create([
            'kode_barang' => $request->kode_barang,
            'nama' => $request->nama,
            'gambar' => $image,
            'harga_beli' => $request->harga_beli,
            'harga_jual' => $request->harga_jual,
            'stok' => $request->stok,
            'kategori' => $request->kategori,
        ]);

        if(!$barang){
            Session::flash('gagal', 'Terjadi Kesalahan!');
            return redirect()->back();
        }
        
        Session::flash('sukses', 'Data Berhasil Ditambahkan!');
        return redirect()->back();
    }
    
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_barang' => 'required',
            'nama' => 'required|string',
            'harga_beli' => 'required|integer',
            'harga_jual' => 'required|integer',
            'stok' => 'required|integer',
            'kategori' => 'required|string',
        ]);

        $img = $request->file('gambar');
        $barang = Barang::findOrFail($id);
        $image = $barang->gambar;

        if($img){
            $image = date('YmdHi').$img->getClientOriginalName();
            $img->move(public_path('images/'), $image);
        }

        $data = $barang->update([
            'kode_barang' => $request->kode_barang,
            'nama' => $request->nama,
            'gambar' => $image,
            'harga_beli' => $request->harga_beli,
            'harga_jual' => $request->harga_jual,
            'stok' => $request->stok,
            'kategori' => $request->kategori,
        ]);

        if(!$data){
            Session::flash('gagal', 'Terjadi Kesalahan!');
            return redirect()->back();
        }
        
        Session::flash('sukses', 'Data Berhasil Diubah!');
        return redirect()->back();
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $barang = Barang::findOrFail($id)->delete();
        
        if(!$barang){
            Session::flash('gagal', 'Terjadi Kesalahan!');
            return redirect()->back();
        }

        Session::flash('sukses', 'Data Berhasil Dihapus!');
        return redirect()->back();
    }
}
