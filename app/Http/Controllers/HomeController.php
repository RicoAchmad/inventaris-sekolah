<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $supplier = DB::table('suppliers')->count();
        $barang = DB::table('barangs')->count();
        $barangmasuk = DB::table('barangmasuks')->count();
        $barangkeluar = DB::table('barangkeluars')->count();
        $pinjaman = DB::table('peminjams')->count();
        $pengembalian = DB::table('pengembalians')->get()->count();
        return view('home', compact('supplier','barang','barangmasuk','barangkeluar','pinjaman', 'pengembalian'));
    }
}
