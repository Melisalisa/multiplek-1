@extends('layouts.layouts')

@section('content')
<div class="pull-right">
    <a href="{{ route('data') }}" class="btn btn-warning btn-xs mb-4"><i
            class="glyphicon glyphicon-chevron-left"> Kembali</i></a>
</div>
<div class="row">
    <div class="col-lg-8 col-lg-offset-3 align-items-center">
        <form action="{{ route('store-penyetor') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="nik">NIK</label>
                <input type="text" name="nik" class="form-control @error('nik') is-invalid @enderror" required
                    autofocus>
                @error('nik')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" required
                    autofocus>
                @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="name">Nama Penyetor</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" required
                    autofocus>
                @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror" required
                    autofocus>
                @error('alamat')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" required
                    autofocus>
                @error('password')
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
