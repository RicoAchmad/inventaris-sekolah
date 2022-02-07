<?php

namespace App\Http\Controllers;

use App\Models\Barangmasuk;
use App\Models\Barang;
use Session;
use Illuminate\Http\Request;

class BarangmasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $bmasuk = Barangmasuk::all();
        return view('admin.bmasuk.index', compact('bmasuk'));
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
        return view('admin.bmasuk.create', compact('barang'));
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
     
        $barangmasuk = new Barangmasuk;
        $barangmasuk->id_barang = $request->id_barang;
        $barangmasuk->tgl_msk = $request->tgl_msk;
        $barangmasuk->jumlah_msk = $request->jumlah_msk;
        $barangmasuk->save();
        Session::flash("flash_notification", [
            "level" => "success",
            "message" => "Data saved successfully",
        ]);

        $barang = Barang::findOrFail($request->id_barang);
        $barang->jumlah_stok += $request->jumlah_msk;
        $barang->save();

        return redirect()->route('bmasuk.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Barangmasuk  $barangmasuk
     * @return \Illuminate\Http\Response
     */
    public function show(Barangmasuk $barangmasuk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Barangmasuk  $barangmasuk
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        // $barangmasuk = Barangmasuk::findOrFail($id);
        // return view('admin.bmasuk.edit', compact('bmasuk'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Barangmasuk  $barangmasuk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        // $validated = $request->validate([
        //     'nama_barang' => 'required',
        //     'tanggal_msk' => 'required',
        //     'jumlah_msk' => 'required',

        // ]);

        // $barangmasuk= Barangmasuk::findOrFail($id);
        // $barangmasuk->id_barang = $request->id_barang;
        // $barangmasukr->tanggal_msk = $request->tanggal_msk;
        // $barangmasuk->jumlah_msk = $request->jumlah_msk;
        // $barangmsk->save();
        // Session::flash("flash_notification", [
        //     "level" => "success",
        //     "message" => "Data edited successfully",
        // ]);
        // return redirect()->route('bmasuk.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Barangmasuk  $barangmasuk
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $barangmasuk = barangmasuk::findOrFail($id);
        $barangmasuk->delete();
        return redirect()->route('bmasuk.index');
        Session::flash("flash_notification", [
            "level" => "success",
            "message" => "Data deleted successfully",
        ]);
        return redirect()->route('bmasuk.index');
    }
}
