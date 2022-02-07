<?php

namespace App\Http\Controllers;

use App\Models\Peminjam;
use App\Models\Barang;
use Session;
use Illuminate\Http\Request;

class PeminjamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $peminjam = Peminjam::all();
        return view('admin.pinjam.index', compact('peminjam'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $barang = Barang::all();
        return view('admin.pinjam.create', compact('barang'));
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
        $peminjam = new Peminjam;
        $peminjam->id_barang = $request->id_barang;
        $peminjam->nama_peminjam = $request->nama_peminjam;
        $peminjam->jumlah_pinjam = $request->jumlah_pinjam;
        $peminjam->tgl_pinjam = $request->tgl_pinjam;

        
        $peminjam->save();
        Session::flash("flash_notification", [
            "level" => "success",
            "message" => "Data saved successfully",
        ]);

        $barang = Barang::findOrFail($request->id_barang);
        $barang->jumlah_stok -= $request->jumlah_pinjam;
        $barang->save();

        return redirect()->route('pinjam.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Peminjam  $peminjam
     * @return \Illuminate\Http\Response
     */
    public function show(Peminjam $peminjam)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Peminjam  $peminjam
     * @return \Illuminate\Http\Response
     */
    public function edit(Peminjam $peminjam)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Peminjam  $peminjam
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Peminjam $peminjam)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Peminjam  $peminjam
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $peminjam = Peminjam::findOrFail($id);
        $peminjam->delete();
        Session::flash("flash_notification", [
            "level" => "success",
            "message" => "Data deleted successfully",
        ]);
        return redirect()->route('pinjam.index');

    }
}
