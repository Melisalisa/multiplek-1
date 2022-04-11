@extends('layouts.layouts')

@section('content')
<div class="pull-right">
    <a href="{{ route('laporan') }}" class="btn btn-warning btn-xs mb-4"><i
            class="glyphicon glyphicon-chevron-left"> Kembali</i></a>
</div>
<div class="row">
    <div class="col-lg-8 col-lg-offset-3 align-items-center">
        <form action="{{ route('store-pendapatan') }}" method="post">
            <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
            @csrf
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
                <label for="jumlah_pendapatan">Jumlah</label>
                <input type="number" name="jumlah_pendapatan" class="form-control @error('jumlah_pendapatan') is-invalid @enderror" required
                    autofocus>
                @error('jumlah_pendapatan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label class="mr-sm-2" for="inlineFormCustomSelect">Kategori</label>
                <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="kategori_id">
                    @foreach ($kategori as $k)
                        <option value="{{ $k->id }}">{{ $k->nama_kategori }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group pull-right mt-2">
                <input type="submit" name="add" value="Tambah" class="btn btn-success">
            </div>
        </form>
    </div>
</div>
@endsection
