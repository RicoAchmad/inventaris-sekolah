<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function index()
    
    {
        $supplier = Supplier::all();
        // return view('admin.supplier.index', compact('supplier'));
      
       //Ubah Json
        return response()->json([
            'success' => true,
            'message' => 'List Data Supplier',
            'date' => $supplier
        ], 200);

        
    
    }
    public function create()
    {
       //


    }

    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'nama_supplier' => 'required',
            'alamat' => 'required',
            'no_wa' => 'required',
        ]);

        $supplier = new Supplier;
        $supplier->nama_supplier = $request->nama_supplier;
        $supplier->alamat = $request->alamat;
        $supplier->no_wa = $request->no_wa;
        $supplier->save();

        //Ubah Json
        return response()->json([
            'success' => true,
            'message' => 'List Data Supplier',
            'date' => $supplier
        ], 200);
       
    }

    public function show($id)
    {
        $supplier = Supplier::find($id);
       
      
       //Ubah Json
        return response()->json([
            'success' => true,
            'message' => 'List Data Supplier',
            'date' => $supplier
        ], 200);
    }

    public function edit($id)
    {
        //
      
    }
    public function update(Request $request,$id)
    {
        //
        // $validated = $request->validate([
        //     'nama_supplier' => 'required',
        //     'alamat' => 'required',
        //     'no_wa' => 'required',
        // ]);

        $supplier= Supplier::findOrFail($id);
        $supplier->nama_supplier = $request->nama_supplier;
        $supplier->alamat = $request->alamat;
        $supplier->no_wa = $request->no_wa;
        $supplier->save();
       
      //Ubah Json
      return response()->json([
        'success' => true,
        'message' => 'List Data Supplier',
        'date' => $supplier
    ], 200);

    }

}