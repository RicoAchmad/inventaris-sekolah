@extends('adminlte::page')

@section('title', 'Pengembalian')

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
                        <b>Data pengembalian</b>
                        <a href="{{ route('kembali.create') }}"
                            class="btn btn-sm btn-outline-primary float-right"><i>Data Pengembalian</i></a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="bmasuk">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nama Peminjam</th>
                                        <th>Nama Barang</th>
                                        <th>Jumlah Kembali</th>
                                        <th>Tanggal Kembali</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                @php $no=1; @endphp
                                @foreach ($pengembalian as $data)
                                    <tbody>
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $data->pinjam->nama_peminjam }}</td>
                                            <td>{{ $data->barang->nama_barang }}</td>
                                            <td>{{ $data->jumlah_kembali }}</td>
                                            <td>{{ $data->tgl_kembali }}</td>


                                            <td>
                                                <form action="{{ route('kembali.destroy', $data->id) }}"
                                                    method="post">
                                                    @method('delete')
                                                    @csrf
                                                    
                                                    <button type="submit" class="btn btn-outline-danger"
                                                        onclick="return confirm('Apakah anda yakin menghapusnya')">HAPUS</button>
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
    <link rel="stylesheet" href="{{ asset('DataTables/datatables.min.css') }}">
@endsection

@section('js')
    <script src="{{ asset('DataTables/datatables.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#bmasuk').DataTable();
        });
    </script>
@endsection