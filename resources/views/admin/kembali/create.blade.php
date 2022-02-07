@extends('adminlte::page')

@section('title','Tambah pengembalian')

@section('content_header')

<br>
@endsection


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Input Data Pengembalian</div>
                <div class="card-body">
                   <form action="{{route('kembali.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">Nama peminjam</label>
                            <select name="id_peminjam" class="form-control @error('id_supplier') is-invalid @enderror" >
                                @foreach($pinjam as $data)
                                    <option value="{{$data->id}}">{{$data->nama_peminjam}}</option>
                                @endforeach
                            </select>
                            @error('id_peminjam')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Nama Barang</label>
                            <select name="id_barang" class="form-control @error('id_supplier') is-invalid @enderror" >
                                @foreach($barang as $data)
                                    <option value="{{$data->id}}">{{$data->nama_barang}}</option>
                                @endforeach
                            </select>
                            @error('id_supplier')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Jumlah Kembali</label>
                            <input type="number" name="jumlah_kembali" class="form-control @error('jumlah_msk') is-invalid @enderror">
                             @error('jumlah_msk')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Tanggal Kembali</label>
                            <input type="date" name="tgl_kembali" class="form-control @error('jumlah_msk') is-invalid @enderror">
                             @error('jumlah_msk')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                   

                        
                      

                            <button type="reset" class="btn btn-outline-warning">Reset</button>
                            <button type="submit" class="btn btn-outline-primary">Simpan</button>
                        </div>
                   </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('css')

@endsection

@section('js')

@endsection
