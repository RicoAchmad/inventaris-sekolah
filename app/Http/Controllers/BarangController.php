<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Supplier;
use Session;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang = Barang::all();
        return view('admin.barang.index', compact('barang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $supplier = Supplier::all();
        return view('admin.barang.create', compact('supplier'));
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
        $validated = $request->validate([
            'nama_barang' => 'required',
            'jumlah_stok' => 'required',
            'id_supplier' => 'required',
        ]);

        $barang = new Barang;
        $barang->nama_barang = $request->nama_barang;
        $barang->jumlah_stok = $request->jumlah_stok;
        $barang->id_supplier = $request->id_supplier;
        $barang->save();
        Session::flash("flash_notification", [
            "level" => "success",
            "message" => "Data saved successfully",
        ]);
        return redirect()->route('barang.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show(Barang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        // $barang = Barang::findOrFail($id);
        // return view('admin.barang.edit', compact('barang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        // $validated = $request->validate([
        //     'nama_barang' => 'required',
        //     'jumlah_stok' => 'required',
        // ]);

        // $barang= Barang::findOrFail($id);
        // $barang->nama_barang = $request->nama_barang;
        // $barang->jumlah_stok = $request->jumlah_stok;
        
        // $barang->save();
        // Session::flash("flash_notification", [
        //     "level" => "success",
        //     "message" => "Data edited successfully",
        // ]);
        // return redirect()->route('barang.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $barang = Barang::findOrFail($id);
        $barang->delete();
        Session::flash("flash_notification", [
            "level" => "success",
            "message" => "Data deleted successfully",
        ]);
        return redirect()->route('barang.index');
    }
    }
