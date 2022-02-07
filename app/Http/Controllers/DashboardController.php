<?php

namespace App\Http\Controllers;

use DB;

class DashboardController extends Controller
{

    public function index()
    {
        $supplier = DB::table('suppliers')->get()->count();
        $barang = DB::table('barangs')->get()->count();
        $barangmasuk = DB::table('barangmasuks')->get()->count();
        $barangkeluar = DB::table('barangkeluars')->get()->count();
        $pinjaman = DB::table('peminjams')->get()->count();
        $pengembalian = DB::table('pengembalians')->get()->count();

        return view(home);
    }

}