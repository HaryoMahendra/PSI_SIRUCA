@extends('layouts.main')
@section('content')
    <div class="content-wrapper">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <div class="card-tools"></div>
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
    </div>
@endsection

@push('css')
@endpush

@push('js')
@endpush
