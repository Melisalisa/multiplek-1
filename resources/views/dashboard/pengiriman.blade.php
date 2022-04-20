@extends('layouts.layouts')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div class="column">
        <h1 class="h3 mb-2 text-gray-800">Laporan</h1>
        <a href="{{ route('create-pengirim') }}" class="btn btn-primary">Tambah Data</a>
    </div>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Pengirim</th>
                        <th>Kategori</th>
                        <th>Tanggal</th>
                        <th>Jumlah_Stok</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pengiriman as $data)
                    <tr>
                        <td>{{ $data->User->name }}</td>
                        <td>{{ $data->kategori->nama_kategori }}</td>
                        <td>{{ $data->tanggal }}</td>
                        <td>{{ $data->jumlah_stok }}</td>
                        <td>
                            @if ($data->status == 'terkirim')
                            <span class="badge badge-success">{{ $data->status }}</span>
                            @endif
                            @if ($data->status == 'belum_terkirim')
                            <span class="badge badge-danger">{{ $data->status }}</span>
                            @endif
                        </td>
                        @if (Auth::user()-> id == 1)
                            <td>
                                <form action="{{ route('update-status-pengirim', $data->id) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <select name="status" id="status" class="form-control">
                                        <option value="terkirim">terkirim</option>
                                        <option value="belum_terkirim">belum_terkirim</option>
                                    </select>
                                    <input type="submit" name="add" value="Submit" class="btn btn-success">
                                </form>
                            </td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
                {{ $pengiriman->links() }}
            </table>
        </div>
    </div>
</div>
@endsection
