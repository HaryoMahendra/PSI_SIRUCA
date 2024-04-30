@extends('layouts.main')
@section('content')
    <div class="content-wrapper">

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0"><b>Halaman Detail User</b></h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Detail User</li>
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
                            <th>Profil</th>
                            <td><img src="{{ asset('storage/photo-user/' . $data->image) }}" style="max-width: 100px;"
                                    alt="Foto">
                            </td>
                        </tr>
                        <tr>
                            <th>Nama Lengkap</th>
                            <td>: {{ $data->name }}</td>
                        </tr>

                        <tr>
                            <th>Email</th>
                            <td>: {{ $data->email }}</td>   
                        </tr> 

                        <tr>    
                            <th>Level</th>
                            <td>: {{ $data->level->level_nama }}</td>     
                        </tr>           

                        <tr>
                            <th>Username</th>
                            <td>: {{ $data->username }}</td>
                        </tr>
                        
                        <tr>
                            <th>Password</th>
                            <td>********</td>
                        </tr>
                    </table>
                @endempty
                <a href="{{ route('admin.index') }}" class="btn btn-sm btn-default mt-2">Kembali</a>
            </div>
        </div>
    
@endsection

@push('css')
@endpush

@push('js')
@endpush
