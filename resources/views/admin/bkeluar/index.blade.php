@extends('adminlte::page')

@section('title','Barang Keluar')

@section('content_header')

<br>
@endsection


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    @include('layouts._flash')
                   <b>Data Barang Keluar</b>
                    <a href="{{route('bkeluar.create')}}" class="btn btn-sm btn-outline-primary float-right"><i>Barang Keluar</i></a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="bmasuk">
                            <thead>
                            <tr>
                            <th>Id</th>
                            <th>Nama Barang</th>                          
                            <th>Tanggal Keluar</th>
                            <th>Jumlah Keluar</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                            </tr>
                            </thead>
                            @php $no=1; @endphp
                            @foreach ($bkeluar as $data)
                            <tbody>
                             <tr>
                             <td>{{ $no++ }}</td>
                             <td>{{ $data->barang->nama_barang}}</td>
                             <td>{{ $data->tgl_klr }}</td>
                             <td>{{ $data->jumlah_klr }}</td>
                             <td>{{ $data->catatan }}</td>


                                 <td>
                                    <form action="{{route('bkeluar.destroy',$data->id)}}" method="post">
                                        @method('delete')
                                        @csrf
                                        <!-- <a href="{{route('bmasuk.edit',$data->id)}}" class="btn btn-outline-info">Edit</a> -->
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
    $('#bmasuk').DataTable();
} );
 </script>
@endsection
