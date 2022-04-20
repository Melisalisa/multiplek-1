@extends('layouts.layouts')

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div class="column">
        <h1 class="h3 mb-2 text-gray-800">Data Penyetor</h1>
        <a href="{{ route('create-penyetor') }}" class="btn btn-primary">Tambah Data</a>
    </div>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" method="GET"
        action="{{ route('search.penyetor') }}">

        <div class="input-group">
            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                aria-label="Search" aria-describedby="basic-addon2" name="search" id="search">
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit">
                    <i class="fas fa-search fa-sm"></i>
                </button>
            </div>
        </div>
    </form>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>NIK</th>
                        <th>Nama Penyetor</th>
                        <th>Email</th>
                        <th>Alamat</th>
                        <th>
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dataPenyetor as $data)
                    <tr>
                        <td>{{ $data->nik }}</td>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->email }}</td>
                        <td>{{ $data->alamat }}</td>
                        <td>
                            <a href="{{ route('edit-penyetor', $data->id) }}"
                                class="btn btn-xs btn-warning btn-flat">Edit</a>
                            <form action="{{ route('delete-penyetor', $data->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="id" value="DELETE">
                                <button type="submit" class="btn btn-xs btn-danger btn-flat"
                                    onclick="return myFunction();" title='Delete'>Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                {{ $dataPenyetor->links() }}
            </table>
        </div>
    </div>
</div>
<script>
    function myFunction() {
        if(!confirm("Are You Sure to delete this"))
        event.preventDefault();
    }
</script>
@endsection
