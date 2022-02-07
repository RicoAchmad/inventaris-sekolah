@extends('adminlte::page')

@section('title','Barang')

@section('content_header')

<br>

@endsection


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Edit Barang</div>
                <div class="card-body">
                    <form action="{{route('barang.update', $barang->id)}}" method="post">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="">Nama Barang</label>
                            <input type="text" name="nama_barang" value=""class="form-control @error('nama_barang') is-invalid @enderror">
                            <label for="">Jumlah Stok</label>
                            <input type="text" name="jumlah_stok" value=""class="form-control @error('jumlah_stok') is-invalid @enderror">
                            </div>
                        <div class="form-group">
                            <button type="reset" class="btn btn-outline-danger">Reset</button>
                            <button type="submit" class="btn btn-outline-primary">Simpan</button>
                        </div>
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
