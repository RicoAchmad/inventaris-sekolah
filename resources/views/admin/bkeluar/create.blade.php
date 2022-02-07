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
                <div class="card-header">Input Barang Keluar</div>
                <div class="card-body">
                   <form action="{{route('bkeluar.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">Nama barang</label>
                            <select name="id_barang" class="form-control @error('id_barang') is-invalid @enderror" >
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
                             <label for="">Tanggal Keluar</label>
                            <input type="date" name="tgl_klr" class="form-control @error('tgl_klr') is-invalid @enderror">
                             @error('tgl_klr')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Jumlah Keluar</label>
                            <input type="number" name="jumlah_klr" class="form-control @error('jumlah_klr') is-invalid @enderror">
                             @error('jumlah_klr')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Keterangan</label>
                            <input type="text" name="catatan" class="form-control @error('jumlah_klr') is-invalid @enderror">
                             @error('catatan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                      

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
