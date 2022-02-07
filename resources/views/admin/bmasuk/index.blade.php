@extends('adminlte::page')

@section('title','Barang Masuk')

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
                   <b>Data Barang Masuk</b>
                    <a href="{{route('bmasuk.create')}}" class="btn btn-sm btn-outline-primary float-right"><i>Tambah Barang</i></a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="bmasuk">
                            <thead>
                            <tr>
                            <th>Id</th>
                            <th>Nama Barang</th>                          
                            <th>Tanggal Masuk</th>
                            <th>Jumlah Masuk</th>
                            <th>Aksi</th>
                            </tr>
                            </thead>
                            @php $no=1; @endphp
                            @foreach ($bmasuk as $data)
                            <tbody>
                             <tr>
                             <td>{{ $no++ }}</td>
                             <td>{{ $data->barang->nama_barang}}</td>
                             <td>{{ $data->tgl_msk }}</td>
                             <td>{{ $data->jumlah_msk }}</td>



                                 <td>
                                    <form action="{{route('bmasuk.destroy',$data->id)}}" method="post">
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
