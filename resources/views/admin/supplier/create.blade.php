@extends('adminlte::page')

@section('title','Supplier')

@section('content_header')

<br>

@endsection


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">Input Supplier</div>
                <div class="card-body">
                    <form action="{{route('supplier.store')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">Nama Supplier</label>
                            <input type="text" name="nama_supplier" class="form-control @error('nama_supplier') is-invalid @enderror">
                            <label for="">Alamat</label>
                            <input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror">
                            <label for="">No Telp</label>
                            <input type="number" name="no_wa" class="form-control @error('no_wa') is-invalid @enderror">
                            @error('nama_supplier')

                            <span class="invalid-feedbaack" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group right">
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
