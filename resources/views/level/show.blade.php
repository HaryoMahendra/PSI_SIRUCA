@extends('layouts.main')

@section('content')
    <div class="content-wrapper">

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0"><b>Halaman Detail Level</b></h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Detail Level</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

            <div class="card-body">
                @empty($data)
                    <div class="alert alert-danger alert-dismissible">
                        <h5><i class="icon fas fa-ban"></i> Kesalahan!</h5>
                        Data yang Anda cari tidak ditemukan.
                    </div>
                @else
                    <table class="table table-bordered table-striped table-hover table-sm">
                        <tr>
                            <th width="30%">ID Level</th>
                            <td>: {{ $data->level_id }}</td>
                        </tr>
                        
                        <tr>
                            <th>Kode Level</th>
                            <td>: {{ $data->level_kode }}</td>
                        </tr>

                        <tr>
                            <th>Nama Level</th>
                            <td>: {{ $data->level_nama }}</td>
                        </tr>

                    </table>
                @endempty
                <a href="{{ route('level.index') }}" class="btn btn-sm btn-default mt-2">Kembali</a>
            </div>
        </div>
    
@endsection

@push('css')
@endpush

@push('js')
@endpush
