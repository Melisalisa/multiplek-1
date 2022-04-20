@extends('layouts.layouts')

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div class="column">
        <h1 class="h3 mb-2 text-gray-800">Laporan</h1>
        <a href="{{ route('create-pendapatan') }}" class="btn btn-primary">Tambah Data</a>
    </div>
    <a href="{{ route('cetak_pdf') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Nama Penyetor</th>
                        <th>Jumlah Pendapatan</th>
                        <th>Kategori</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($laporan as $data)
                    <tr>
                        <td>{{ $data->tanggal }}</td>
                        <td>{{ $data->User->name }}</td>
                        <td>Rp. {{number_format($data->jumlah_pendapatan) }}</td>
                        <td>{{ $data->kategori->nama_kategori }}</td>
                    </tr>
                    @endforeach
                </tbody>
                {{ $laporan->links() }}
            </table>
        </div>
    </div>
</div>
@endsection
