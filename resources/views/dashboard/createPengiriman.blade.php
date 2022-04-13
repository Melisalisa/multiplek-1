@extends('layouts.layouts')

@section('content')

@if(Auth::user()-> id == 1)
    <div class="pull-right">
        <a href="{{ route('pengiriman') }}" class="btn btn-warning btn-xs mb-4"><i
                class="glyphicon glyphicon-chevron-left"> Kembali</i></a>
    </div>
@endif
<div class="row">
    <div class="col-lg-8 col-lg-offset-3 align-items-center">
        <form action="{{ route('store-pengiriman') }}" method="post">
            @csrf

            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
            <div class="form-group">
                <label class="mr-sm-2" for="inlineFormCustomSelect">Kategori</label>
                <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="kategori_id">
                    @foreach ($kategori as $k)
                        <option value="{{ $k->id }}">{{ $k->nama_kategori }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="tanggal">Tanggal</label>
                <input type="date" name="tanggal" class="form-control @error('tanggal') is-invalid @enderror" required
                    autofocus>
                @error('tanggal')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="jumlah_stok">Jumlah Stok</label>
                <input type="number" name="jumlah_stok" class="form-control @error('jumlah_stok') is-invalid @enderror" required
                    autofocus>
                @error('jumlah_stok')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group pull-right mt-2">
                <input type="submit" name="add" value="Tambah" class="btn btn-success">
            </div>
        </form>
    </div>
</div>
@endsection
