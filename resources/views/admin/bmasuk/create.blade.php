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
                <div class="card-header">Input Barang Masuk</div>
                <div class="card-body">
                   <form action="{{route('bmasuk.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">Nama barang</label>
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
                             <label for="">Tanggal Masuk</label>
                            <input type="date" name="tgl_msk" class="form-control @error('tgl_msk') is-invalid @enderror">
                             @error('tgl_msk')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Jumlah Masuk</label>
                            <input type="number" name="jumlah_msk" class="form-control @error('jumlah_msk') is-invalid @enderror">
                             @error('jumlah_msk')
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
