<?php

namespace App\Http\Controllers;

use App\Models\Pengembalian;
use App\Models\Peminjam;
use App\Models\Barang;
use Session;
use Illuminate\Http\Request;

class PengembalianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pengembalian = Pengembalian::all();
        return view('admin.kembali.index', compact('pengembalian'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $barang = Barang::all();
        $pinjam = Peminjam::all();
        return view('admin.kembali.create', compact('barang' , 'pinjam'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $kembali = new Pengembalian;
        $kembali->id_peminjam = $request->id_peminjam;
        $kembali->id_barang = $request->id_barang; 
        $kembali->jumlah_kembali = $request->jumlah_kembali;
        $kembali->tgl_kembali = $request->tgl_kembali;
        $kembali->save();
        Session::flash("flash_notification", [
            "level" => "success",
            "message" => "Data saved successfully",
        ]);

        $barang = Barang::findOrFail($request->id_barang);
        $barang->jumlah_stok += $request->jumlah_kembali;
        $pinjam = Peminjam::findOrFail ($request->id_peminjam);
        $pinjam->jumlah_pinjam -= $request->jumlah_kembali;
        $barang->save();
        $pinjam->save();

        return redirect()->route('kembali.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengembalian  $pengembalian
     * @return \Illuminate\Http\Response
     */
    public function show(Pengembalian $pengembalian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengembalian  $pengembalian
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengembalian $pengembalian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pengembalian  $pengembalian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pengembalian $pengembalian)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengembalian  $pengembalian
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $kembali = Pengembalian::findOrFail($id);
        $kembali->delete();
        Session::flash("flash_notification", [
            "level" => "success",
            "message" => "Data deleted successfully",
        ]);
        return redirect()->route('kembali.index');

    
    }
}
