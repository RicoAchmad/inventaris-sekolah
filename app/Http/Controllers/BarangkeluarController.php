<?php

namespace App\Http\Controllers;

use App\Models\Barangkeluar;
use App\Models\Barang;
use Session;
use Illuminate\Http\Request;

class BarangkeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $bkeluar = Barangkeluar::all();
        return view('admin.bkeluar.index', compact('bkeluar'));
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
        return view('admin.bkeluar.create', compact('barang'));
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
        $barangkeluar = new Barangkeluar;
        $barangkeluar->id_barang = $request->id_barang;
        $barangkeluar->tgl_klr = $request->tgl_klr;
        $barangkeluar->jumlah_klr = $request->jumlah_klr;
        $barangkeluar->catatan = $request->catatan;
        $barangkeluar->save();
        Session::flash("flash_notification", [
            "level" => "success",
            "message" => "Data saved successfully",
        ]);

        $barang = Barang::findOrFail($request->id_barang);
        $barang->jumlah_stok -= $request->jumlah_klr;
        $barang->save();

        return redirect()->route('bkeluar.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Barangkeluar  $barangkeluar
     * @return \Illuminate\Http\Response
     */
    public function show(Barangkeluar $barangkeluar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Barangkeluar  $barangkeluar
     * @return \Illuminate\Http\Response
     */
    public function edit(Barangkeluar $barangkeluar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Barangkeluar  $barangkeluar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Barangkeluar $barangkeluar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Barangkeluar  $barangkeluar
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $barangkeluar = barangkeluar::findOrFail($id);
        $barangkeluar->delete();
        return redirect()->route('bkeluar.index');
        Session::flash("flash_notification", [
            "level" => "success",
            "message" => "Data deleted successfully",
        ]);
        return redirect()->route('bkeluar.index');
    }
}
