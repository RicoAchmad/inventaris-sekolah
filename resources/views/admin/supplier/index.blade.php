@extends('adminlte::page')

@section('title','Data Supplier')

@section('content_header')


@endsection


@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    @include('layouts._flash')
                   <b>Data Supplier</b>
                    <a href="{{route('supplier.create')}}" class="btn btn-sm btn-outline-primary float-right"><i>Tambah Supplier</i></a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="example">
                        <thead>
                            <tr>
                                <th><i>Id</i></th>
                                <th><i>Nama Supplier</i></th>
                                <th><i>Alamat</i></th>
                                <th><i>No Telp</i></th>
                                <th><i>Aksi</i></th>
                            </tr>
                        </thead>
                            @php $no=1; @endphp
                            @foreach ($supplier as $data)
                            <tbody>
                             <tr>
                                 <td>{{$no++}}</td>
                                 <td>{{$data->nama_supplier}}</td>
                                 <td>{{$data->alamat}}</td>
                                 <td>{{$data->no_wa}}</td>



                                 <td>
                                     <form action="{{route('supplier.destroy',$data->id)}}" method="post">
                                        @method('delete')
                                        @csrf
                                        <a href="{{route('supplier.edit',$data->id)}}" class="btn btn-outline-info">Edit</a>
                                        <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Apakah anda yakin menghapusnya')">HAPUS</button>
                                        </form>
                                 </td>
                             </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection

@section('css')
<link rel="stylesheet" href="{{asset('DataTables/datatables.min.css')}}">
@endsection

@section('js')
 <script src="{{asset('DataTables/datatables.min.js')}}"></script>
 <script>
     $(document).ready(function() {
    $('#example').DataTable();
} );
 </script>
@endsection
