@extends('layouts.layouts')

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div class="column">
        <h1 class="h3 mb-2 text-gray-800">Data Penyetor</h1>
        <a href="#" class="btn btn-primary">Tambah Data</a>
    </div>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
        class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>NIK</th>
                        <th>Nama Penyetor</th>
                        <th>Alamat</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>S12038109238</td>
                        <td>Tiger Nixon</td>
                        <td>Edinburgh</td>
                    </tr>
                    <tr>
                        <td>123613618</td>
                        <td>Garrett Winters</td>
                        <td>Tokyo</td>
                    </tr>
                    <tr>
                        <td>123456r</td>
                        <td>Donna Snider</td>
                        <td>New York</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
