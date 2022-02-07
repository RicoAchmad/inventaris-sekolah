<!-- @extends('adminlte::page')

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
                    <form action="{{route('bmasuk.update', $barangmasuk->id)}}" method="post">
                        @csrf
                        @method('put')
                        <div class="form-group">
                        <label for="">Nama barang</label>
                            <select name="id_barang" class="form-control @error('id_barang') is-invalid @enderror" >
                                @foreach($barang as $data)
                                    <option value="{{$data->id}}">{{$data->id_barang}}</option>
                                @endforeach
                            </select>
                            @error('id_barang')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
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

@endsection -->
